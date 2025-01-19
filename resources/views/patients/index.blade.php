@extends('layouts.app')

@section('title', 'Manage Patients')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4">Manage Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>General Practitioner</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->user->name }}</td>
            <td>{{ $patient->generalPractitioner->name ?? 'Not Assigned' }}</td>
            <td>{{ $patient->date_of_birth }}</td>
            <td>{{ ucfirst($patient->gender) }}</td>
            <td>{{ $patient->contact_number }}</td>
            <td>
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
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