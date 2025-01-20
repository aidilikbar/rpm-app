<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // Reference to the users table
        'date_of_birth',
        'gender',
        'contact_number',
        'address',
        'gp_id',  // Reference to the general practitioner
    ];

    /**
     * Relationship: A patient belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship: A patient can have multiple monitoring data records.
     */
    public function monitoringData()
    {
        return $this->hasMany(RpmMonitoringData::class);
    }

    /**
     * Relationship: A patient is assigned to one general practitioner.
     */
    public function generalPractitioner()
    {
        return $this->belongsTo(User::class, 'gp_id')->where('role', 'general_practitioner');
    }

    public function gp()
    {
        return $this->belongsTo(User::class, 'gp_id')->where('role', 'general_practitioner');
    }
}
