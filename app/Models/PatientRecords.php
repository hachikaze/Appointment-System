<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRecords extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    
    protected $fillable = [
        'patient_name',
        'email',
        'phone',
        'date',
        'time',
        'doctor',
        'appointments',
        // 'status',
    ];
    
    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];
}
