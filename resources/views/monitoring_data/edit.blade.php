@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Edit Monitoring Data</h2>
            
            <form action="{{ route('monitoring-data.update', $monitoringData->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Patient Dropdown -->
                <div class="mb-4">
                    <label for="patient_id" class="block text-gray-700 font-medium mb-2">Patient</label>
                    <select name="patient_id" id="patient_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a Patient</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $monitoringData->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sensor Type -->
                <div class="mb-4">
                    <label for="sensor_type" class="block text-gray-700 font-medium mb-2">Sensor Type</label>
                    <select name="sensor_type" id="sensor_type" class="w-full border-gray-300 rounded-md shadow-sm">
                        @foreach ($sensorTypes as $type)
                            <option value="{{ $type }}" {{ $monitoringData->sensor_type === $type ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $type)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sensor Value -->
                <div class="mb-4">
                    <label for="sensor_value" class="block text-gray-700 font-medium mb-2">Sensor Value</label>
                    <input type="number" step="0.01" name="sensor_value" id="sensor_value" value="{{ $monitoringData->sensor_value }}" class="w-full border-gray-300 rounded-md">
                </div>

                <!-- Recorded At -->
                <div class="mb-4">
                    <label for="recorded_at" class="block text-gray-700 font-medium mb-2">Recorded At</label>
                    <input type="datetime-local" name="recorded_at" id="recorded_at" value="{{ \Carbon\Carbon::parse($monitoringData->recorded_at)->format('Y-m-d\TH:i') }}" class="w-full border-gray-300 rounded-md">
                </div>

                <!-- Actions -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                    <a href="{{ route('monitoring-data.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection