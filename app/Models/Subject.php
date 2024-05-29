<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'classroom_type_id',
        'name',
        'description',
    ];

    public function classroomType()
    {
        return $this->belongsTo(ClassroomType::class);
    }
}