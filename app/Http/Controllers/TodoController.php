<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{   
    protected $task;
    public function __construct()
    {
        $this->task=new Todo();
    }
    public function index()
    {
        $response['tasks']=$this->task->all();
        return view('pages.todo.index')->with($response); 
    }

    public function store(Request $request)
    {
        $this->task->create($request->all());
        return redirect()->route('todo')->with('success', 'Todo created successfully!');
    }

    public function update(Request $request, $id)
    {
        $task = $this->task->findOrFail($id);
        $task->update($request->all());
        return redirect()->route('todo')->with('success', 'Todo updated successfully!');
    }

    public function delete($id)
    {
        $task = $this->task->findOrFail($id);
        $task->delete();
        return redirect()->route('todo')->with('success', 'Todo deleted successfully!');
    }
}
