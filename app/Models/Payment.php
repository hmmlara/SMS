<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_person_id',
        'invoice_no',
        'invoice_date',
    ];

    public function descriptions(){
        return $this->belongsToMany(Description::class,"description_payments");
    }

    public function studentPersonal(){
        $this->belongsTo(StudentPersonal::class);
    }
}
