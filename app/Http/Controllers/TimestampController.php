<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Timestamp;
use Carbon\Carbon;
use App\User;



class TimestampController extends Controller
{
    public function start()
    {
        $user_id = Auth::id();
        $newTimestampDay = Carbon::today();
        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldTimestamp = Timestamp::where('user_id', $user_id)->latest()->first();

    // DD($user);
    // DD($oldTimestamp);

    if( !empty($oldTimestamp)){
        $oldTimestampDate = $oldTimestamp->date;
        $newTimestampDate = $newTimestamp->format('Y-m-d');
        if($oldTimestampDate = $newTimestampDate){
            return back()->with('error','既に出勤打刻がされています');
            }
    }

    Timestamp::create([
        'user_id' => $user_id,
        'work_start => Carbon::now()'
    ]);
    return back()->with('my_status','出勤打刻が完了しました');
}






    public function create(Request $request)
    {
        $param = [
            'id'           => $request->name,
            'users_id'     => $request->users_id,
            'workstart'    => $request->workstart,
            'workend'      => $request->workend,
            'total_rest'   => $request->total_rest,
            'total_work'   => $request->total_work,
            'stamp_date'   => $request->total_work,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('users')->insert($param);
        return redirect('/data');
    }

    public function workstart()
    {
        $user = Auth::user();
        /**
         * 打刻は1日一回までにしたい
         */
        $oldTimestamp = Timestamp::where('user_id', $user->id)->latest()->first();
        if ($oldTimestamp) {
            $oldTimestampworkstart = new Carbon($oldTimestamp->workstart);
            $oldTimestampDay = $oldTimestampworkstart->startOfDay();
        }

        $newTimestampDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、直前のTimestampの退勤打刻がされていない場合エラーを出す。
         */
        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->workend))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $timestamp = Timestamp::create([
            'user_id' => $user->id,
            'punchIn' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function workend()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        if( !empty($timestamp->workend)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update([
            'workend' => Carbon::now()
    ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}