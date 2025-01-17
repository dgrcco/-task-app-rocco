<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Support\Collection;

class TaskController extends Controller
{
    public function index(Request $request) 
    { 
        $tasks = Task::query(); 
    
        //prendi tutti i parametri e i valori assegnati
        $input = $request->all();
        $input = $request->collect();

        
        if (!$input->isEmpty()) {
        
            $priority = $request->input('priority');
        
            if ($priority != "Tutte") {    
                $tasks = $tasks->where('priority', $priority); 
            }
        }

        $tasks = $tasks->orderBy('priority', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    } 
 
    public function create() 
    { 
        return view('tasks.create'); 
    } 
 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'description' => 'nullable|string', 
            'priority' => 'nullable|string',
            'status' => 'nullable|string',
        ]); 
 
        Task::create($request->all()); 
        return redirect()->route('tasks.index'); 
    } 
 
    public function show(Task $task) 
    { 
        $comments = Comment::where('task_id', $task->id)->get();
        return view('tasks.show', compact('task','comments')); 
    } 
 
    public function edit(Task $task) 
    { 
        return view('tasks.edit', compact('task')); 
    } 
 
    public function update(Request $request, Task $task) 
    { 
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'description' => 'nullable|string', 
            'priority' => 'nullable|string',
            'status' => 'nullable|string',
        ]); 
 
        $task->update($request->all()); 
        return redirect()->route('tasks.index'); 
    } 
 
    public function destroy(Task $task) 
    { 
        $task->delete(); 
        return redirect()->route('tasks.index'); 
    }
}
