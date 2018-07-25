<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getAllTasks(){
        if (Auth::check()) {
            $tasks = Task::where('user_id', Auth::id())->get();
            return $tasks;
        }
        return response()->json([
            'message' => 'Not authenticated!',
        ], 401);
    }

    public function getTask($id){

        $task = Task::findOrFail($id);

        if (Auth::id() == $task->user->id){
            return $task;
        }

        return response()->json([
            'message' => 'Not your task!',
        ], 401);
    }

    public function deleteTask($id){
        $task = Task::findOrFail($id);
        if (Auth::id() == $task->user->id){
            $task->delete();
            return response()->json([
                'message' => 'Deleted!',
            ], 200);
        }

        return response()->json([
            'message' => 'Not your task, you can\'t delete it!',
        ], 401);
    }

    public function createTask(Request $request){
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => 1
        ]);

        return $task;
    }
}
