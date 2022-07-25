<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;


class Attendance extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);

    }

    public function sumRest()
    {
        $rests = $this->rests;

        $sum = 0;
        foreach($rests as $rest)
        {
            $start_time = $rest->start_time;
            $end_time = $rest->end_time;
            // 秒に直して計算する、差分の秒を足す
            // $sumRestTime = ($end_time - $start_time);
            $start_time_cal = strtotime($start_time);
            // dd($start_time_cal);
            $end_time_cal = strtotime($end_time);

            // var_dump($end_time);
            if(!$end_time) {
                continue;
            }
            $sumRestTime = ($end_time_cal - $start_time_cal);
            $sum = $sum + $sumRestTime;
            // dd($sumRestTime);
            // return ($start_time);
            // dd($start_time);
        }
        $hours = floor($sum / 3600);
        $minutes = floor(($sum / 60) % 60);
        $seconds = $sum % 60;
        $hms = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        return $hms;
    }

}
