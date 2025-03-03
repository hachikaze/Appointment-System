<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';
    
    protected $fillable = ['receipt_number', 'file_path', 'appointment_id'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
