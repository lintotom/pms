<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status','project_id'
      ];


    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id');
    }
    public function time_sheets()
      {
          return $this->hasMany('App\Models\TimeSheet','task_id');
      }

}
