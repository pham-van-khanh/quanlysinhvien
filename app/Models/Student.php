<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'faculty_id', 'email', 'avatar', 'phone', 'birthday', 'address', 'gender'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

}
