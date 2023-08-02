<?php

namespace App\Http\Controllers\ApiControllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\task\TaskCollection;
use App\Http\Resources\task\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =  new TaskCollection(Task::all());
        return $this->suucessResponce(200 , $tasks , 'List of Tasks Received Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title' => ['required' , 'string'],
            'content'=> ['required' , 'string'],
            'cart_id' => ['required' , 'integer']
        ]);

        if ($validator->fails()){
            return $this->failResponce(422 , $validator->messages());
        }

        $task = Task::create([
            'title' => $request->title,
            'content' => $request->content,
            'cart_id' => $request->cart_id,
        ]);

        $task = new TaskResource($task);

        return $this->suucessResponce(200 , $task , 'Task Created SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = new TaskResource($task);
        return $this->suucessResponce(200 , $task , 'Task Received Successfully');
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
        $validator = Validator::make($request->all() , [
            'title' => ['required' , 'string'],
            'content'=> ['required' , 'string'],
            'cart_id' => ['required' , 'integer']
        ]);

        if ($validator->fails()){
            return $this->failResponce(422 , $validator->messages());
        }

        $task->update([
            'title' => $request->title,
            'content' => $request->content,
            'cart_id' => $request->cart_id,
        ]);
        $task = new TaskResource(Task::find($task->id));
        return $this->suucessResponce(200 , $task , 'Task Updated SuccessFully');
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
        $task = new TaskResource($task);
        return $this->suucessResponce(200 , $task , 'Task Deleted SuccessFully');
    }

    public function changetaskstatus(Request $request , $id){
        $task = Task::find($id);
        if($task->status == 'done'){
            $task->update([
                'status' => 'undone'
            ]);
        }elseif($task->status == 'undone'){
            $task->update([
                'status' => 'done'
            ]);
        }
        $task = Task::find($id);
        $task = new TaskResource($task);
        return $this->suucessResponce(200 , $task , 'Task Updated SuccessFully');
    }
}
