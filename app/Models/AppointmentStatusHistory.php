<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentStatusHistory extends Model
{
    use HasFactory;

    protected $table = 'appointment_status_history';
    
    protected $fillable = [
        'appointment_id',
        'from_status',
        'to_status',
        'changed_by_user_id',
        'notes'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by_user_id');
    }
}