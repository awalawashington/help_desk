<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function course_departments()
    {
        return $this->hasMany(CourseDepartment::class);
    }

    public function admins()
    {
        return $this->morphMany(Admin::class, 'adminable');
    }

    public function issues()
    {
        return $this->morphMany(Issue::class, 'issuable');
    }
}