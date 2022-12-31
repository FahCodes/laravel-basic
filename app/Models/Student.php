<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    //protected $table = 'students'; ->Jika nama table plural dan model singular maka laravel dapat membaca tanpa menggunakan sintaks disamping.
    //protected $primaryKey = 'nis'; ->Jika primary bukan id atau bawaan laravel.
    //public $incrementing = false; ->Digunakan jika id tidak menggunakan AUTO_INCREMENT. tidak dibuat = true.
    //protected $keyType = 'string'; ->Jika type data dari primary key bukan integer, jika integer maka tidak perlu dibuat.
    //public $timestamps = false; -> Digunakan Jika tidak menggunakan timestamps, hapus jika ada.
    //protected $fillable = ['column database that is allowed to fill'];
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'gender',
        'nis',
        'class_id',
        'image',
    ];
    
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
}