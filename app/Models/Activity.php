<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'user_id',
        'item_id'
    ];

    /* Get the user that performed the activity. */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Get the inventory item associated with the activity. */
    public function item()
    {
        return $this->belongsTo(Inventory::class, 'item_id');
    }
    
    /*Log an activity*/
    public static function log($type, $description, $userId = null, $itemId = null)
    {
        return self::create([
            'type' => $type,
            'description' => $description,
            'user_id' => $userId ?? auth()->id(),
            'item_id' => $itemId
        ]);
    }
}