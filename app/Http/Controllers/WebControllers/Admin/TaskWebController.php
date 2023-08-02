<?php

namespace App\Http\Controllers\WebControllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Cart::all();
        return view('admin.tasks.create')->with(['carts' => $carts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
           'title' => ['required' , 'string'],
           'content'=> ['required' , 'string'],
           'cart_id' => ['required' , 'integer']
        ]);

        $task = Task::create([
            'title' => $request->title,
            'content' => $request->content,
            'cart_id' => $request->cart_id,
        ]);

        session()->flash('success' , 'new Task Registered Successfully');
        return redirect(route('carts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $carts = Cart::all();
        return view('admin.tasks.edit')->with(['carts' => $carts , 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request , [
            'title' => ['required' , 'string'],
            'content'=> ['required' , 'string'],
            'cart_id' => ['required' , 'integer']
         ]);
 
         $task->update([
             'title' => $request->title,
             'content' => $request->content,
             'cart_id' => $request->cart_id,
         ]);
 
         session()->flash('success' , 'Task Updated Successfully');
         return redirect(route('carts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        session()->flash('success' , 'Task Deleted Successfully');
         return redirect(route('carts.index'));
    }
}
