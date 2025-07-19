<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'job_id', 'status', 'cv_path', 'coverletter'];

    protected function job()
    {
        return $this->belongsTo(Job::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
