<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableAppointment extends Model
{
    use HasFactory;

    protected $table = 'available_appointments';

    protected $fillable = ['date', 'time_slot', 'max_slots'];

    public function bookedAppointments()
    {
        return $this->hasMany(Appointment::class, 'date', 'date')->where('time', $this->time_slot);
    }

    public function remainingSlots()
    {
        return $this->max_slots - $this->bookedAppointments()->count();
    }
}
