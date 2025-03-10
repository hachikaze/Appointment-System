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
        'id',
        'name', // Add the name field to fillable
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

    /**
     * Get the user's full name.
     * This accessor ensures we can always get the full name even if only components are stored
     */
    public function getNameAttribute($value)
    {
        // If name is already set, return it
        if (!empty($value)) {
            return $value;
        }
        
        // Otherwise construct it from components
        $middleInitial = $this->middleinitial ? " {$this->middleinitial} " : " ";
        return trim($this->firstname . $middleInitial . $this->lastname);
    }

    /**
     * Set the user's name and parse it into components
     * This mutator ensures components are updated when full name is set
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        
        // Parse the name into components if they're not already set
        if (empty($this->firstname) || empty($this->lastname)) {
            $nameParts = explode(' ', trim($value));
            
            // Extract name components
            $this->attributes['firstname'] = $nameParts[0] ?? '';
            
            // Handle middle initial
            if (count($nameParts) > 2) {
                $middleInitial = $nameParts[1] ?? '';
                // If it's longer than 1 character, just take the first character
                if (strlen($middleInitial) > 1) {
                    $middleInitial = substr($middleInitial, 0, 1);
                }
                $this->attributes['middleinitial'] = $middleInitial;
            }
            
            // Last name is the last part
            if (count($nameParts) > 1) {
                $this->attributes['lastname'] = count($nameParts) > 2 ? $nameParts[2] : $nameParts[1];
            }
        }
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
}