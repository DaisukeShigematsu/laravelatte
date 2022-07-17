<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    protected $fillable = [
        'attendance_id',
        'start_time',
        'end_time',
    ];
    /**
     * ユーザー関連付け
     * 1対多
     */
    //public function attendance()
    //{
    //    $this->belongsTo(attendance::class);
    //}
}