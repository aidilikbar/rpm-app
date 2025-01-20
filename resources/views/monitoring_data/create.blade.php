@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-6">Add Monitoring Data</h2>
            <form action="{{ route('monitoring-data.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="patient_id" class="block text-gray-700 font-medium mb-2">Patient</label>
                    <select name="patient_id" id="patient_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a Patient</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="sensor_type" class="block text-gray-700 font-medium mb-2">Sensor Type</label>
                    <input type="text" name="sensor_type" id="sensor_type" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="sensor_value" class="block text-gray-700 font-medium mb-2">Sensor Value</label>
                    <input type="number" name="sensor_value" id="sensor_value" step="0.01" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="recorded_at" class="block text-gray-700 font-medium mb-2">Recorded At</label>
                    <input type="datetime-local" name="recorded_at" id="recorded_at" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                    <a href="{{ route('monitoring-data.index') }}" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection