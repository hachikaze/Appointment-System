<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    
    /**
     * Get the receipts for the appointment.
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
    
    /**
     * Get the status history for the appointment.
     */
    public function statusHistory()
    {
        return $this->hasMany(AppointmentStatusHistory::class);
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
        'user_id'
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
    
    /**
     * Get the payments for the appointment.
     */
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
    
    /**
     * Get the status of the appointment at a specific point in time.
     *
     * @param string|Carbon $date
     * @return string|null
     */
    public function getStatusAtDate($date)
    {
        // Convert to Carbon if it's not already
        if (!($date instanceof Carbon)) {
            $date = Carbon::parse($date);
        }
        
        // If appointment was created after the date, it didn't exist yet
        if ($this->created_at > $date) {
            return null;
        }
        
        // Get the latest status change before or at the given date
        $latestStatusChange = $this->statusHistory()
            ->where('created_at', '<=', $date)
            ->orderBy('created_at', 'desc')
            ->first();
        
        // If no status changes before the date, use the initial status
        // (which is typically the status it was created with)
        if (!$latestStatusChange) {
            // If the appointment was created with a status other than the default,
            // we should return that initial status
            return $this->getOriginal('status') ?? 'Pending';
        }
        
        return $latestStatusChange->to_status;
    }
    
    /**
     * Check if the appointment had a specific status during a given time period.
     *
     * @param string $status
     * @param string|Carbon $startDate
     * @param string|Carbon $endDate
     * @return bool
     */
    public function hadStatusDuringPeriod($status, $startDate, $endDate)
    {
        // Convert to Carbon if they're not already
        if (!($startDate instanceof Carbon)) {
            $startDate = Carbon::parse($startDate)->startOfDay();
        }
        if (!($endDate instanceof Carbon)) {
            $endDate = Carbon::parse($endDate)->endOfDay();
        }
        
        // If appointment was created after the end date, it didn't exist during the period
        if ($this->created_at > $endDate) {
            return false;
        }
        
        // If current status is the one we're looking for and no status changes during period
        // that changed it from this status
        if ($this->status === $status) {
            $changedFromThisStatus = $this->statusHistory()
                ->where('from_status', $status)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->exists();
                
            if (!$changedFromThisStatus) {
                // Check if it had this status before or during the period
                $statusAtStart = $this->getStatusAtDate($startDate);
                return $statusAtStart === $status;
            }
        }
        
        // Check if it changed to this status during the period
        $changedToThisStatus = $this->statusHistory()
            ->where('to_status', $status)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->exists();
            
        if ($changedToThisStatus) {
            return true;
        }
        
        // Check if it started with this status and changed from it during the period
        $changedFromThisStatus = $this->statusHistory()
            ->where('from_status', $status)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->exists();
            
        if ($changedFromThisStatus) {
            return true;
        }
        
        // Check if it had this status at the start of the period and didn't change
        $statusAtStart = $this->getStatusAtDate($startDate);
        return $statusAtStart === $status;
    }
}