@extends('layouts.app')

@section('title', 'Edit Monitoring Data')

@section('content')
<h1 class="h4 mb-3">Edit Monitoring Data</h1>

<form action="{{ route('monitoring-data.update', $monitoringData->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="patient_id" class="form-label">Patient</label>
        <select name="patient_id" id="patient_id" class="form-select" required>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}" {{ $monitoringData->patient_id == $patient->id ? 'selected' : '' }}>
                    {{ $patient->user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="sensor_type" class="form-label">Sensor Type</label>
        <select name="sensor_type" id="sensor_type" class="form-select" required>
            <option value="blood_glucose" {{ $monitoringData->sensor_type == 'blood_glucose' ? 'selected' : '' }}>Blood Glucose</option>
            <option value="blood_pressure" {{ $monitoringData->sensor_type == 'blood_pressure' ? 'selected' : '' }}>Blood Pressure</option>
            <option value="heart_rate" {{ $monitoringData->sensor_type == 'heart_rate' ? 'selected' : '' }}>Heart Rate</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="sensor_value" class="form-label">Sensor Value</label>
        <input type="number" name="sensor_value" id="sensor_value" class="form-control" value="{{ $monitoringData->sensor_value }}" required>
    </div>

    <div class="mb-3">
        <label for="recorded_at" class="form-label">Recorded At</label>
        <input type="datetime-local" name="recorded_at" id="recorded_at" class="form-control" value="{{ $monitoringData->recorded_at }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection