<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'workstart',
        'workend',
        'total_work'
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