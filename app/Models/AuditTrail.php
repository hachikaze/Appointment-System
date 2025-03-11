<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    // Define the table associated with the model
    protected $table = 'audit_trail';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'action',
        'model',
        'changes',
        'ip_address',
        'user_agent'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
