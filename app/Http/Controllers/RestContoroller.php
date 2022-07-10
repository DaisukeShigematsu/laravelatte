<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Timestamp;
use Carbon\Carbon;

class RestController extends Controller
{

    public function start()
    {
        $user_id = Auth::id();
        $TimestampDay = Carbon::today();

        // このログインユーザーの最新のレコードを取得
        $latestTimestamp = Timestamp::where('user_id', $user_id)->latest()->first();

        if(empty($latestTimestamp)) {
            return back()->with('error', '勤務情報がありません');
        }

        // このログインユーザーの最新のレコードのアテンダンスIDを取得
        $timestampId = $latestTimestamp->id;

        // このログインユーザーの最新のレコードの日付を取得
        $latestTimestampDate = $latestTimestamp->date;

        // 今日の日付を取得
        $timestampDate = $timestampDay->format('Y-m-d');

        // このログインユーザーの最新のレコードのアテンダンスIDに紐づく最新の休憩レコードを取得
        $latestRest = Rest::where('stamp_id', $timestampId)->latest()->first();

        if($timestampDate == $latestTimestampDate) {
            if(empty($latestRest) || !empty($latestRest->end_time) && empty($latestTimestamp->end_time)) {
                Rest::create([
                    'timestamp_id' => $timestampId,
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
        $timestampDay = Carbon::today();

        // このログインユーザーの最新のレコードを取得
        $latesttimestamp = Timestamp::where('user_id', $user_id)->latest()->first();

        if(empty($latestTimestamp)) {
            return back()->with('error', '勤務情報がありません');
        }

        // このログインユーザーの最新のレコードのアテンダンスIDを取得
        $timestampId = $latestTimestamp->id;

        // このログインユーザーの最新のレコードの日付を取得
        $latestTimestampDate = $latestTimestamp->date;

        // 今日の日付を取得
        $timestampDate = $timestampDay->format('Y-m-d');

        // このログインユーザーの最新のレコードのアテンダンスIDに紐づく最新の休憩レコードを取得
        $latestRest = Rest::where('timestamp_id', $timestampId)->latest()->first();
        if(empty($latestRest)) {
            return back()->with('error', '休憩情報がありません');
        }

        if($timestampDate == $latestTimestampDate) {
            if(empty($latestRest->end_time) && empty($latestTimestamp->end_time)){
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

