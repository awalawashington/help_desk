<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role'
    ];

    public function admins()
    {
        return $this->morphMany(Admin::class, 'adminable');
    }

    public function issues()
    {
        return $this->morphMany(Issue::class, 'issuable');
    }

}
