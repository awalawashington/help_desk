<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'name'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function admins()
    {
        return $this->morphMany(Admin::class, 'adminable');
    }

    public function helps()
    {
        return $this->morphMany(Help::class, 'issuable');
    }
}
