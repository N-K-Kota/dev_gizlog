<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    //
    protected $fillable = ['user_id', 'title', 'name', 'contents', 'reporting_time'];
}
