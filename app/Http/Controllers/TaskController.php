<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Category;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function taskView(){
        $tasks = Task::all();
        $categorys = Category::all();
        return view('task', ['tasks' => $tasks, 'categorys' => $categorys]);
    }
    public function createTask(Request $request){
        $validate = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'completed' => 'required',
                'id_categories' => 'required|numeric'
            ]
        );

        Task::create($validate);
        return redirect()->route('task')->with('success', 'Tarea creada exitosamente');
    }

    public function updateTaskView( $id){
        $task = Task::find($id);
        $categorys = Category::all();
        return view('editTask', ['task' => $task,'categorys' => $categorys]);
    }

    public function updateTask(Request $request, $id){
        $validate = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'completed' => 'required',
                'id_categories' => 'required|numeric'
            ]
        );

        Task::where('id', $id)->update($validate);
        return redirect()->route('task')->with('success', 'Tarea actualizada exitosamente');
    }
    public function deleteTask($id){
        Task::destroy($id);
        return redirect()->route('task')->with('success', 'Tarea eliminada exitosamente');
    }
}

