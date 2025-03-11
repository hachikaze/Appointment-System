<?php
namespace App\Models;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    
    /* The attributes that are mass assignable. */
    protected $table = 'users';
    protected $fillable = [
        'firstname',
        'middleinitial',
        'lastname',
        'email',
        'gender',
        'password',
        'image_path',
        'user_type'
    ];
    
    /* The attributes that should be hidden for serialization. */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /* Get the attributes that should be cast. */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }
    
    /**
     * Check if user is an admin
     */
    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }
    
    /**
     * Check if user is a patient
     */
    public function isPatient()
    {
        return $this->user_type === 'patient';
    }

    /**
     * Get the appointments for the user.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function auditTrails()
    {
        return $this->hasMany(AuditTrail::class, 'user_id');
    }
}
