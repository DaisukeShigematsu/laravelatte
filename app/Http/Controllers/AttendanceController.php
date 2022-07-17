<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    public function start()
    {
        $user_id = Auth::id();
        $newAttendanceDay = Carbon::today();

        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldAttendance = Attendance::where('user_id', $user_id)->latest()->first();

        // DD($user);
        // DD($oldAttendance);

        if( !empty($oldAttendance)){
            $oldAttendanceDate = $oldAttendance->date;
            $newAttendanceDate = $newAttendance->format('Y-m-d');
        if($oldAttendanceDate = $newAttendanceDate){
            return back()->with('error','既に出勤打刻がされています');
            }
        }

        Attendance::create([
            'user_id' => $user_id,
            'work_start' => Carbon::now(),
            'date' => $newAttendanceDay
        ]);

        return back()->with('my_status','出勤打刻が完了しました');
    }


    public function end()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();

        if(empty($attendance) || !empty($attendance->end_time)) {
            return back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $attendance->update([
            'end_time' => Carbon::now()
        ]);
        return back()->with('my_status', '退勤打刻が完了しました');
    }


    public function index()
    {
        $attendances = Attendance::simplePaginate(5);
        $today = Carbon::today();

        return view('date', ['attendances' => $attendances],['today' => $today] );
    }

}