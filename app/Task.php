<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = array('id');
    public static $rules = array(
        'category' => 'required',
        'title' => 'required',
        'deadline' => 'after:yesterday',
    );
    
    public static function getTodayStudy($tasks) {
        $output = 0;
        foreach ($tasks as $task) {
            if ($task->category == "勉強") {
                $start = $task->time; //開始時刻
                $stop = $task->end; //終了時刻
                
                [$startHour, $startMinute, $startSecond] = explode(":", $start);
                [$stopHour, $stopMinute, $stopSecond] = explode(":", $stop);
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
            }
        }
        return $output;
    }
    
    public static function getTodayWork($tasks) {
        $output = 0;
        foreach ($tasks as $task) {
            if ($task->category == "仕事") {
                $start = $task->time; //開始時刻
                $stop = $task->end; //終了時刻
                
                [$startHour, $startMinute, $startSecond] = explode(":", $start);
                [$stopHour, $stopMinute, $stopSecond] = explode(":", $stop);
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
            }
        }
        return $output;
    }
    
    public static function getTodayReading($tasks) {
        $output = 0;
        foreach ($tasks as $task) {
            if ($task->category == "読書") {
                $start = $task->time; //開始時刻
                $stop = $task->end; //終了時刻
                
                [$startHour, $startMinute, $startSecond] = explode(":", $start);
                [$stopHour, $stopMinute, $stopSecond] = explode(":", $stop);
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
            }
        }
        return $output;
    }
    
    public static function getTodayHousework($tasks) {
        $output = 0;
        foreach ($tasks as $task) {
            if ($task->category == "家事") {
                $start = $task->time; //開始時刻
                $stop = $task->end; //終了時刻
                
                [$startHour, $startMinute, $startSecond] = explode(":", $start);
                [$stopHour, $stopMinute, $stopSecond] = explode(":", $stop);
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
            }
        }
        return $output;
    }
    
    public static function getTodayTraining($tasks) {
        $output = 0;
        foreach ($tasks as $task) {
            if ($task->category == "筋トレ") {
                $start = $task->time; //開始時刻
                $stop = $task->end; //終了時刻
                
                [$startHour, $startMinute, $startSecond] = explode(":", $start);
                [$stopHour, $stopMinute, $stopSecond] = explode(":", $stop);
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
            }
        }
        return $output;
    }
}
