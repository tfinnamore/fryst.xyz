<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Controllers\Controller;

class ToDoController extends Controller
{

  //todo when marking a item complete, show a dot and then ajax upload. upon success, mark with checkmark



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todo)
    {
        //return a view that shows all todos
        $todos = $todo->all();

        // dd($todos);
        return view('todo.index')->with('todos' , $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request, Todo $todo)
    {
        //
      $todo->create( $request->all() );
      return redirect()->route('todo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Todo $todo)
    {
        //
        $showTodo = $todo->findOrFail($id);
        return view('todo.show')->with('todo', $showTodo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Todo $todo)
    {
        //
        $editTodo = $todo->findOrFail($id);
        return view('todo.edit')->with('todo', $editTodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTodoRequest $request, $id, Todo $todo)
    {
        //
        $updateTodo = $todo->findOrFail($id);
        $updateTodo->fill($request->all());
        $updateTodo->save();
        return redirect()->route('todo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Todo $todo)
    {
        //
        $todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
    public function complete($id, Todo $todo)
    {
      $complete = $todo->find($id);
      $complete->status = 'Complete';
      $complete->save();
      return \Response::json('success', 200);
    }
}
