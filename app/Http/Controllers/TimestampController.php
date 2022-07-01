<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TimestampController extends Controller
{
    public function punchin()
    {
        $user = Auth::user();
        /**
         * 打刻は1日一回までにしたい
         * DB
         */
        $oldtimestamp = timestamp::where('user_id', $user->id)->latest()->first();
        if ($oldtimestamp) {
            $oldtimestampPunchIn = /** */ ($oldtimestamp->punchIn);
            $oldtimestampDay = $oldtimestampPunchIn->startOfDay();
        }


        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $timestamp = Timestamp::create([
            'user_id' => $user->id,
            'punchIn' => /** */now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function punchout()
    {
        $user = Auth::user();
        $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        if( !empty($timestamp->punchOut)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $timestamp->update(['punchout' => /** */now()]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}