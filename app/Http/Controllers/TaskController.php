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
        //to do: sistemare le query http in modo più efficente per la gestione / fatto
        // di più parametri e richieste provenienti da index
        $tasks = Task::query(); 
    
        //prendi tutti i parametri e i valori assegnati
        $input = $request->all();
        //$input = $request->collect();
        //dd($input);

        if (isset($input['priority']) && $input['priority'] !== "Tutte") {
            $tasks = $tasks->where('priority', $input['priority']);
        }
        
        if (isset($input['category']) && $input['category'] !== "Tutte") {
            $tasks = $tasks->where('category', $input['category']);
        }

        /*
        if (!$input->isEmpty()) {
        
            $priority = $request->input('priority');
            print($priority . "\n");
            $category = $request->input('category');
            print($category);
        
            if ($priority != "Tutte") {    
                $tasks = $tasks->where('priority', $priority)->where('category', $category); 
            }
        }
        */

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
            'category' => 'nullable|string',
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
            'category' => 'nullable|string',
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
