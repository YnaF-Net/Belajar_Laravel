<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'major_id',
        'name',
        'phone'
    ];

    //belongsTo
    public function major() 
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }
}

// Object Relation Mode
// One to One : jarang dipakai
// One to many : satu ke banyak
// Many to many