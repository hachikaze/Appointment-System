<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
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
        'status'
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