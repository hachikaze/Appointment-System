<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
    protected $table = 'inventory';
    
    public $timestamps = false;
    
    protected $fillable = [
        'item_name',
        'category',
        'quantity',
        'unit',
        'minimum_stock_level',
        'expiry_date',
        'status',
        'notes'
    ];
    
    protected $dates = [
        'expiry_date'
    ];
    
    // Define relationship with InventoryUsage
    public function usageRecords()
    {
        return $this->hasMany(InventoryUsage::class, 'inventory_id');
    }
    
    // Define relationship with Activity
    public function activities()
    {
        return $this->hasMany(Activity::class, 'item_id');
    }
    
    // Check if item is low on stock
    public function isLowStock()
    {
        return $this->quantity > 0 && $this->quantity <= $this->minimum_stock_level;
    }
    
    // Check if item is out of stock
    public function isOutOfStock()
    {
        return $this->quantity <= 0;
    }
    
    // Check if item is expired or about to expire
    public function isExpired()
    {
        if (!$this->expiry_date) {
            return false;
        }
        return $this->expiry_date->isPast();
    }
    
    public function isAboutToExpire($days = 30)
    {
        if (!$this->expiry_date) {
            return false;
        }
        return !$this->expiry_date->isPast() && $this->expiry_date->diffInDays(now()) <= $days;
    }
}