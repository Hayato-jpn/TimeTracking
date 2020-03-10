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
                
                if ($stopHour < $startHour) {
                    $stopHour += 24;
                }
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
                
                //1時間以上あれば、◯◯時間xx分という形にする
                if ($output >= 60) {
                    $hour = floor($output / 60);
                    $minute = $output % 60;
                    $output = "{$hour} 時間 {$minute} 分";
                } elseif ($output > 0 && $output < 60) {
                    $output = "{$output} 分";
                } else {
                    $output = "0 分";
                }
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
                
                if ($stopHour < $startHour) {
                    $stopHour += 24;
                }
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
                
                //1時間以上あれば、◯◯時間xx分という形にする
                if ($output >= 60) {
                    $hour = floor($output / 60);
                    $minute = $output % 60;
                    $output = "{$hour} 時間 {$minute} 分";
                } elseif ($output > 0 && $output < 60) {
                    $output = "{$output} 分";
                } else {
                    $output = "0 分";
                }
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
                
                if ($stopHour < $startHour) {
                    $stopHour += 24;
                }
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
                
                //1時間以上あれば、◯◯時間xx分という形にする
                if ($output >= 60) {
                    $hour = floor($output / 60);
                    $minute = $output % 60;
                    $output = "{$hour} 時間 {$minute} 分";
                } elseif ($output > 0 && $output < 60) {
                    $output = "{$output} 分";
                } else {
                    $output = "0 分";
                }
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
                
                if ($stopHour < $startHour) {
                    $stopHour += 24;
                }
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
                
                //1時間以上あれば、◯◯時間xx分という形にする
                if ($output >= 60) {
                    $hour = floor($output / 60);
                    $minute = $output % 60;
                    $output = "{$hour} 時間 {$minute} 分";
                } elseif ($output > 0 && $output < 60) {
                    $output = "{$output} 分";
                } else {
                    $output = "0 分";
                }
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
                
                if ($stopHour < $startHour) {
                    $stopHour += 24;
                }
                
                //分換算
                $output += ($stopHour - $startHour) * 60;
                $output += ($stopMinute - $startMinute);
                
                //1時間以上あれば、◯◯時間xx分という形にする
                if ($output >= 60) {
                    $hour = floor($output / 60);
                    $minute = $output % 60;
                    $output = "{$hour} 時間 {$minute} 分";
                } elseif ($output > 0 && $output < 60) {
                    $output = "{$output} 分";
                } else {
                    $output = "0 分";
                }
            }
        }
        return $output;
    }
}
