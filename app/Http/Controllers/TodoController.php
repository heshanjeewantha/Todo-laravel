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

   

    public function delete($id)
    {

        $task = $this->task->findOrFail($id);
        $task->delete();
        return redirect()->route('todo')->with('success', 'Todo deleted successfully!');
    }

   public function edit($id)
{
    \Log::info('Edit method called with ID: ' . $id);
    try {
        $response['todo'] = $this->task->findOrFail($id);
        return view('pages.todo.edit')->with($response);
    } catch (\Exception $e) {
        \Log::error('Error in edit method: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
    
    public function update(Request $request, $id)
    {
        $task = $this->task->findOrFail($id);
        $task->update($request->all());
        return redirect()->route('todo')->with('success', 'Todo updated successfully!');
    }
}
