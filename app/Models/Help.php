<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'response',
        'evidence',
        'admin_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }

    public function school_departments()
    {
        return $this->belongsTo(SchoolDepartment::class);
    }

    public function helpable()
    {
        return $this->morphsTo();
    }

}
