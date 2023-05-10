<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = ['title','units','cost'];

    public function payments(){
        return $this->belongToMany(Payment::class,'description_payments');
    }
}
