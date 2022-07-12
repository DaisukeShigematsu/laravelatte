<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'rests';


    protected $fillable = [
        'stamp_id',
        'reststart',
        'restend',
    ];
/**
     * ユーザー関連付け
     * 1対多
     */
    public function timestamp()
    {
        $this->belongsTo(Timestamp::class);
    }



}