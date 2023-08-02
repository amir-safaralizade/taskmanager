<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('welcome')->with(['user' => $user]);
    }

    public function changetaskstatus(Request $request ,  $id){
        $task = Task::findOrfail($id);
        if($task->status == 'done'){
            $task->update([
                'status' => 'undone'
            ]);
        }elseif($task->status == 'undone'){
            $task->update([
                'status' => 'done'
            ]);
        }
        return back();
    }
}
