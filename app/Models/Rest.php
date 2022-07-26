<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
use App\Models\User;


class Rest extends Model
{
    protected $fillable = ['attendance_id', 'start_time', 'end_time'];

}

