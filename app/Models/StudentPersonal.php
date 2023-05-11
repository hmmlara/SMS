<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPersonal extends Model
{
    use HasFactory;
    public function payments(){
        $this->hasMany(Payment::class);
    }
}
