<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id','hour','task_date','description'
      ];

    public function task()
    {
        return $this->belongsTo('App\Models\Task','task_id');
    }
}
