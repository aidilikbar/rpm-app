@extends('layouts.app')

@section('title', 'Add Monitoring Data')

@section('content')
<h1 class="h4 mb-3">Add Monitoring Data</h1>

<form action="{{ route('monitoring-data.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="patient_id" class="form-label">Patient</label>
        <select name="patient_id" id="patient_id" class="form-select" required>
            <option value="">Select a Patient</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="sensor_type" class="form-label">Sensor Type</label>
        <select name="sensor_type" id="sensor_type" class="form-select" required>
            <option value="blood_glucose">Blood Glucose</option>
            <option value="blood_pressure">Blood Pressure</option>
            <option value="heart_rate">Heart Rate</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="sensor_value" class="form-label">Sensor Value</label>
        <input type="number" name="sensor_value" id="sensor_value" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="recorded_at" class="form-label">Recorded At</label>
        <input type="datetime-local" name="recorded_at" id="recorded_at" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection