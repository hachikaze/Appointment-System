<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMessages extends Model
{

    use HasFactory;

    protected $table = 'user_messages';


    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'status',
        'read_at',
        'subject',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
