<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TimeController extends Controller
{
    //
    public function start(Request $request) {
        $user_id = Auth::id();
        $tasks = Task::where('user_id', $user_id)->where('id', $request->id)->get();
        $task = Task::where('user_id', $user_id)->where('id', $request->id)->first();
        if ($task->status == "作業中") {
            return view('admin.time.stop', ['tasks' => $tasks]);
        }
        return view('admin.time.start', ['tasks' => $tasks]);
    }
    
    public function record(Request $request) {
        $user_id = Auth::id();
        $task = Task::where('user_id', $user_id)->where('id', $request->id)->first();
        $task->status = '作業中';
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $task->time = $now;
        $task->save();
        $timeOutput = \Carbon\Carbon::now()->format('Y-n-j G:i:s');
        return view('admin.time.record', ['timeOutput' => $timeOutput]);
    }
    
    public function stop(Request $request) {
        $user_id = Auth::id();
        $tasks = Task::where('user_id', $user_id)->where('id', $request->id)->get();
        return view('admin.time.stop', ['tasks' => $tasks]);
    }
    
    public function end(Request $request) {
        $user_id = Auth::id();
        $task = Task::where('user_id', $user_id)->where('id', $request->id)->first();
        $task->status = '完了';
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $task->date = $date; //完了した日付を入力
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $task->end = $now;
        $task->save();
        $timeOutput = \Carbon\Carbon::now()->format('Y-n-j G:i:s');
        return view('admin.time.end', ['timeOutput' => $timeOutput]);
    }
    
    public function today(Request $request) {
        $user_id = Auth::id();
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        $tasks = Task::where('user_id', $user_id)->where('date', $today)->get();
        
        $study = Task::getTodayStudy($tasks);
        $work = Task::getTodayWork($tasks);
        $reading = Task::getTodayReading($tasks);
        $housework = Task::getTodayHousework($tasks);
        $training = Task::getTodayTraining($tasks);
        
        $array = [$study, $work, $reading, $housework, $training];
        foreach ($array as $a) {
            if (empty($a)) {
                $a = "0 分";
            }
        }
        
        return view('admin.time.today', compact('study', 'work', 'reading', 'housework', 'training'));
    }
    
    public function index(Request $request) {
        $user_id = Auth::id();
        $date = $request->date;
        $day = \Carbon\Carbon::now()->format('Y-m-d');
        if ($date != '') {
            $tasks = Task::where('user_id', $user_id)->where('date', $date)->where('status', "完了")->orderBy('deadline','asc')->get();
        } else {
            $tasks = Task::where('user_id', $user_id)->where('date', $day)->where('status', "完了")->orderBy('time','asc')->get();
        }
        return view('admin.time.index', ['tasks' => $tasks]);
    }
    
    public function edit(Request $request) {
        $user_id = Auth::id();
        $task = Task::find($request->id);
        if (empty($task)) {
            abort(404);
        }
        return view('admin.time.edit', ['task_form' => $task, 'user_id' => $user_id]);
    }
    
    public function update(Request $request) {
        $this->validate($request, Task::$rules);
        $task = Task::find($request->id);
        $task_form = $request->all();
        unset($task_form['_token']);
        $task->fill($task_form)->save();
        return redirect('admin/time/index');
    }
    
    public function delete(Request $request) {
        $task = Task::find($request->id);
        $task->delete();
        return redirect('admin/time/index');
    }
    
    public function return(Request $request) {
        $user_id = Auth::id();
        $task = Task::find($request->id);
        if (empty($task)) {
            abort(404);
        }
        return view('admin.time.return', ['task_form' => $task, 'user_id' => $user_id]);
    }
    
    public function register(Request $request) {
        $this->validate($request, Task::$rules);
        $task = new Task;
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form);
        $task->save();
        return redirect('admin/task/index');
    }
}
