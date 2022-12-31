<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
    ];
    
    public function class()
    {
        return $this->hasOne(ClassRoom::class);
    }
}
