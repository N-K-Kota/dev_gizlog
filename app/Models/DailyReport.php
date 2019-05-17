<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'title', 'name', 'contents', 'reporting_time'];
}
