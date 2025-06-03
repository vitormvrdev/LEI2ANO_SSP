<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = Priority::all();
        return view('admin.priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('admin.priorities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Priority::create($request->all());

        return redirect()->route('admin.priorities.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $priority = Priority::findOrFail($id);
        return view('admin.priorities.edit', compact('priority'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $priority = Priority::findOrFail($id);
        $priority->name = $request->name;
        $priority->status = $request->status;
        $priority->save();

        return redirect()->route('admin.priorities.index')->with('success', 'Priority atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $priority = Priority::findOrFail($id);
        $priority->delete();

        return redirect()->route('admin.priorities.index')->with('success', 'Priority eliminada com sucesso!');
    }
}
