<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extracurricular extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
    ];

    public function students()
    {
    return $this->belongsToMany(Student::class, 'student_extracurricular', 'extracurricular_id', 'student_id');
    }
}
