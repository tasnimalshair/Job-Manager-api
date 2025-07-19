<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'salary',
        'company',
        'category_id',
        'created_by'
    ];

    protected function applications()
    {
        return $this->hasMany(Application::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
