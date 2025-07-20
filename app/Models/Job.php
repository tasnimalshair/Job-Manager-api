<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $table = "job-listings";

    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'deadline',
        'salary',
        'company',
        'category_id',
        'created_by'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
