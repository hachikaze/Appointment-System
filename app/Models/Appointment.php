<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    /**
     * Get the user that owns the appointment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    protected $fillable = [
        'patient_name',
        'email',
        'phone',
        'date',
        'time',
        'doctor',
        'appointments',
        'status',
        'id'
    ];
    
    // Define date fields
    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];
    
    // Define relationship with InventoryUsage
    public function inventoryUsage()
    {
        return $this->hasMany(InventoryUsage::class, 'appointment_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    // Format time for display
    public function getFormattedTimeAttribute()
    {
        return date('g:i A', strtotime($this->time));
    }
    
    // Format date for display
    public function getFormattedDateAttribute()
    {
        return date('M d, Y', strtotime($this->date));
    }
}