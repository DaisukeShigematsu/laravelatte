<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rest;

class Attendance extends Model
{

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
        'date'
    ];

    /**
     * ユーザー関連付け
     * 1対多
     */
    public function user()
    {
        $this->belongsTo(User::class);
    }

    /**
     * Rest関連付け 1対多
     */
    public function rest()
    {
        return $this->hasMany(Rest::class);
    }

}