<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'reststart',
        'restend',
        'total_rest'
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * タイムスタンプ関連付け
     * 1対多
     */
    public function timestamp()
    {
        return $this->belongsto(Timestamp::class);
    }


  }