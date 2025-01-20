@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-3xl font-bold mb-6">Welcome to Remote Patient Monitoring</h1>
    <p class="mb-6">Monitor and manage patient data effectively and securely with our system.</p>

    <!-- Feature Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Monitoring Data -->
        <a href="{{ route('monitoring-data.index') }}" class="block bg-white shadow-md rounded-lg p-6 hover:bg-gray-50">
            <h2 class="font-semibold text-xl text-blue-500">Monitoring Data</h2>
            <p class="text-gray-600">View and manage real-time patient monitoring data collected from devices.</p>
        </a>

        <!-- Manage Patients -->
        <a href="{{ route('patients.index') }}" class="block bg-white shadow-md rounded-lg p-6 hover:bg-gray-50">
            <h2 class="font-semibold text-xl text-blue-500">Manage Patients</h2>
            <p class="text-gray-600">Add, update, and view patient records for effective care coordination.</p>
        </a>
    </div>
</div>
@endsection