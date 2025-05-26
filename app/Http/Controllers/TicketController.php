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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();
        $levels = Level::all();
        
        return view('ticket.create', compact('categories', 'priorities', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'priority_id' => 'required|exists:priorities,id',
                'level_id' => 'required|exists:levels,id',
            ]
        );
        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->description = $request->input('description');
        $ticket->category_id = $request->input('category_id');
        $ticket->priority_id = $request->input('priority_id');
        $ticket->level_id = $request->input('level_id');
        $ticket->user_id = auth()->id(); // Assuming you have user authentication
        $ticket->save();
        return redirect()->route('ticket.create')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
