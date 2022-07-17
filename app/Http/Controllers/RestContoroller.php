<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Attendance;
use Carbon\Carbon;

class RestController extends Controller
{

    public function start()
    {
        $user_id = Auth::id();
        $attendanceDay = Carbon::today();

        // このログインユーザーの最新のレコードを取得
        $latestAttendance = Attendance::where('user_id', $user_id)->latest()->first();

        if(empty($latestAttendance)) {
            return back()->with('error', '勤務情報がありません');
        }

        // このログインユーザーの最新のレコードのアテンダンスIDを取得
        $attendanceId = $latestAttendance->id;

        // このログインユーザーの最新のレコードの日付を取得
        $latestAttendanceDate = $latestAttendance->date;

        // 今日の日付を取得
        $attendanceDate = $attendanceDay->format('Y-m-d');

        // このログインユーザーの最新のレコードのアテンダンスIDに紐づく最新の休憩レコードを取得
        $latestRest = Rest::where('attendance_id', $attendanceId)->latest()->first();

        if($attendanceDate == $latestAttendanceDate) {
            if(empty($latestRest) || !empty($latestRest->end_time) && empty($latestAttendance->end_time)) {
                Rest::create([
                    'attendance_id' => $attendanceId,
                    'start_time' => Carbon::now(),
                ]);
                return back()->with('my_status', '休憩開始打刻が完了しました');
            } else {
                return back()->with('error', '休憩が終了していないか、既に勤務が終了しています');
            }
        } else {
            return back()->with('error', '勤務が開始されていません');
        }

    }


    public function end()
    {
        $user_id = Auth::id();
        $attendanceDay = Carbon::today();

        // このログインユーザーの最新のレコードを取得
        $latestAttendance = Attendance::where('user_id', $user_id)->latest()->first();

        if(empty($latestAttendance)) {
            return back()->with('error', '勤務情報がありません');
        }

        // このログインユーザーの最新のレコードのアテンダンスIDを取得
        $attendanceId = $latestAttendance->id;
        // このログインユーザーの最新のレコードの日付を取得
        $latestAttendanceDate = $latestAttendance->date;
        // 今日の日付を取得
        $attendanceDate = $attendanceDay->format('Y-m-d');

        // このログインユーザーの最新のレコードのアテンダンスIDに紐づく最新の休憩レコードを取得
        $latestRest = Rest::where('attendance_id', $attendanceId)->latest()->first();
        if(empty($latestRest)) {
            return back()->with('error', '休憩情報がありません');
        }

        if($attendanceDate == $latestattendanceDate) {
            if(empty($latestRest->end_time) && empty($latestAttendance->end_time)){
                $latestRest->update([
                    'end_time' => Carbon::now()
                ]);
                return back()->with('my_status', '休憩終了打刻が完了しました');
            } else {
                return back()->with('error', '休憩が開始されていないか、既に勤務が終了しています');
            }
        } else {
            return back()->with('error', '勤務が開始されていません');
        }
    }

}

