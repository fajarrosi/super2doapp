<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $task = Todo::orderBy('task','ASC')->get();
        return $task ? handleResponse(200,'success get task',$task) : handleResponse(400,'failed get task');
    }
    
    public function addTask(TodoRequest $request)
    {
        $task = Todo::create($request->all());
        return $task ? handleResponse(200,'success add task') : handleResponse(400,'failed add task');
    }

    public function updateTask(TodoRequest $request)
    {
        $task = Todo::findOrFail($request->id)->update($request->all());
        return $task ? handleResponse(200,'success update Task') : handleResponse(400,'failed update Task');
    }

    public function deleteTask(Request $request)
    {
        $task = Todo::findOrFail($request->id)->delete();
        return $task ? handleResponse(200,'success delete Task') : handleResponse(400,'failed delete Task');
    }

    public function completedTask(Request $request)
    {
        $task = json_decode($request['todos']);
        for ($i=0; $i < count($task) ; $i++) { 
            $upd = Todo::findOrFail($task[$i]->id)->update(['completed' => $task[$i]->completed]);
        }
        return $task ? handleResponse(200,'success set completed to Task') : handleResponse(400,'failed set completed to Task');
    }

    public function deleteCompleted(Request $request)
    {
        $task = json_decode($request['todos']);
        for ($i=0; $i < count($task) ; $i++) { 
            $upd = Todo::findOrFail($task[$i]->id)->delete();
        }
        return $task ? handleResponse(200,'success delete Task') : handleResponse(400,'failed delete Task');
    }

}
