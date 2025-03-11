<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableAppointment extends Model
{
    use HasFactory;

    protected $table = 'available_appointments';

    protected $fillable = ['date', 'time_slot', 'max_slots'];

    protected $appends = ['start_time', 'end_time'];
    

    public function getStartTimeAttribute()
    {
        return \Carbon\Carbon::createFromFormat('h:i A', explode(' - ', $this->time_slot)[0])->format('H:i:s');
    }

    public function getEndTimeAttribute()
    {
        return \Carbon\Carbon::createFromFormat('h:i A', explode(' - ', $this->time_slot)[1])->format('H:i:s');
    }

    public function bookedAppointments()
    {
        return $this->hasMany(Appointment::class, 'date', 'date')->where('time', $this->time_slot);
    }

    public function remainingSlots()
    {
        return $this->max_slots - $this->bookedAppointments()->count();
    }
}
