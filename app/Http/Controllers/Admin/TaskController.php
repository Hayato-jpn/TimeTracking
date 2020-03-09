<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
    //
    public function create() {
        $user_id = Auth::id();
        return view('admin.task.create', ['user_id' => $user_id]);
    }
    
    public function record(Request $request) {
        $this->validate($request, Task::$rules);
        $task = new Task;
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form);
        $task->save();
        return redirect('admin/task/index');
    }
    
    public function index(Request $request) {
        $user_id = Auth::id();
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $tasks = Task::where('user_id', $user_id)->where('status', '=', "未着手")->orwhere('status', '=', "作業中")->where('title', 'like', "%{$cond_title}%")->orderBy('deadline','asc')->get();
        } else {
            $tasks = Task::where('user_id', $user_id)->where('status', '=', "未着手")->orwhere('status', '=', "作業中")->orderBy('deadline','asc')->get();
        }
        return view('admin.task.index', ['tasks' => $tasks, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request) {
        $user_id = Auth::id();
        $task = Task::find($request->id);
        if (empty($task)) {
            abort(404);
        }
        return view('admin.task.edit', ['task_form' => $task, 'user_id' => $user_id]);
    }
    
    public function update(Request $request) {
        $this->validate($request, Task::$rules);
        $task = Task::find($request->id);
        $task_form = $request->all();
        unset($task_form['_token']);
        $task->fill($task_form)->save();
        return redirect('admin/task/index');
    }
      
    public function delete(Request $request) {
        $task = Task::find($request->id);
        $task->delete();
        return redirect('admin/task/index');
    }
}
