<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment';

    protected $fillable = [
        'patient_name', 'email', 'phone', 'date', 'time', 'doctor', 'appointmentss', 'status'
    ];
}
