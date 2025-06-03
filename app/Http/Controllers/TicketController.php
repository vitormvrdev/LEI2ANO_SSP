<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Models\Level;
use App\Models\Priority;
use App\Models\Category;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ticket::with(['category', 'priority', 'level', 'user']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('id', 'like', '%' . $search . '%');
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Priority filter
        if ($request->filled('priority_id')) {
            $query->where('priority_id', $request->get('priority_id'));
        }

        // Category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->get('category_id'));
        }

        // Level filter
        if ($request->filled('level_id')) {
            $query->where('level_id', $request->get('level_id'));
        }

        // Order by created_at desc
        $query->orderBy('created_at', 'desc');

        // Paginate results
        $tickets = $query->paginate(10);

        // Get filter options
        $categories = Category::all();
        $priorities = Priority::all();
        $levels = Level::all();

        // Calculate stats
        $stats = [
            'open' => Ticket::where('status', 'open')->count(),
            'in_progress' => Ticket::where('status', 'in_progress')->count(),
            'closed' => Ticket::where('status', 'closed')->count(),
            'total' => Ticket::count(),
        ];

        return view('tickets.index', compact('tickets', 'categories', 'priorities', 'levels', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();
        $levels = Level::all();
        
        return view('tickets.create', compact('categories', 'priorities', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
            'level_id' => 'required|exists:levels,id',
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->category_id = $request->input('category_id');
        $ticket->priority_id = $request->input('priority_id');
        $ticket->level_id = $request->input('level_id');
        $ticket->user_id = auth()->id();
        $ticket->status = 'open'; // Default status
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load(['category', 'priority', 'level', 'user']);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $priorities = Priority::all();
        $levels = Level::all();
        
        return view('tickets.edit', compact('ticket', 'categories', 'priorities', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
            'level_id' => 'required|exists:levels,id',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->category_id = $request->input('category_id');
        $ticket->priority_id = $request->input('priority_id');
        $ticket->level_id = $request->input('level_id');
        $ticket->status = $request->input('status');
        
        // Set closed_at when status changes to closed
        if ($request->input('status') === 'closed' && $ticket->status !== 'closed') {
            $ticket->closed_at = now();
        } elseif ($request->input('status') !== 'closed') {
            $ticket->closed_at = null;
        }
        
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket excluído com sucesso!');
    }

    /**
     * Change ticket status
     */
    public function changeStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,closed',
        ]);

        $ticket->status = $request->input('status');
        
        if ($request->input('status') === 'closed') {
            $ticket->closed_at = now();
        } else {
            $ticket->closed_at = null;
        }
        
        $ticket->save();

        return redirect()->back()->with('success', 'Status do ticket alterado com sucesso!');
    }

    /**
     * Bulk actions for tickets
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,change_status',
            'tickets' => 'required|array',
            'tickets.*' => 'exists:tickets,id',
            'status' => 'required_if:action,change_status|in:open,in_progress,closed',
        ]);

        $tickets = Ticket::whereIn('id', $request->tickets);

        switch ($request->action) {
            case 'delete':
                $count = $tickets->count();
                $tickets->delete();
                return redirect()->back()->with('success', "$count tickets excluídos com sucesso!");
                
            case 'change_status':
                $count = $tickets->count();
                $updateData = ['status' => $request->status];
                
                if ($request->status === 'closed') {
                    $updateData['closed_at'] = now();
                } else {
                    $updateData['closed_at'] = null;
                }
                
                $tickets->update($updateData);
                return redirect()->back()->with('success', "Status de $count tickets alterado com sucesso!");
        }

        return redirect()->back();
    }
}