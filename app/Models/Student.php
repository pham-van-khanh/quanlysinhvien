<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'faculty_id', 'code', 'user_id', 'email', 'avatar', 'phone', 'birthday', 'address', 'gender'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot('mark');
    }

}
