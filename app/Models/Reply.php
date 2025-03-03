<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'message_id',
        'from_user_id',
        'to_user_id',
        'subject',
        'message'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
