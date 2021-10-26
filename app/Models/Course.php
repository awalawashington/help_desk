<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_department_id',
        'name',
    ];

    public function users()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function course_department()
    {
        return $this->belongsTo(CourseDepartment::class);
    }

}
