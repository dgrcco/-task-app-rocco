<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Collection;

class CommentController extends Controller
{
 
    public function store(Request $request, Task $task) 
    { 
        $request->validate([ 
            'comment' => 'nullable|string',
        ]);


        Comment::create([
            'task_id' => $task->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('tasks.show', $task->id);  
    }


 
    public function destroy(Task $task, Comment $comment, ) 
    { 
        $comment->delete(); 
        return redirect()->route('tasks.show', $task->id); 
    }
}
