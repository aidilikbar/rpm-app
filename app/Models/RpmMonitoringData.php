<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RpmMonitoringData extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'sensor_type',
        'sensor_value',
        'recorded_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
