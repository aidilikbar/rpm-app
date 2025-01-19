@extends('layouts.app')

@section('title', 'Monitoring Data')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4">Monitoring Data</h1>
    <a href="{{ route('monitoring-data.create') }}" class="btn btn-primary">Add Monitoring Data</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Patient</th>
            <th>Sensor Type</th>
            <th>Sensor Value</th>
            <th>Recorded At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($monitoringData as $data)
        <tr>
            <td>{{ $data->patient->user->name }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $data->sensor_type)) }}</td>
            <td>{{ $data->sensor_value }}</td>
            <td>{{ $data->recorded_at }}</td>
            <td>
                <a href="{{ route('monitoring-data.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('monitoring-data.destroy', $data->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection