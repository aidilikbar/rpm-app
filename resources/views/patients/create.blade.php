@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')
<h1 class="h4 mb-3">Add Patient</h1>

<form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">Select a User</option>
            @foreach (\App\Models\User::where('role', 'patient')->get() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="gp_id" class="form-label">General Practitioner</label>
        <select name="gp_id" id="gp_id" class="form-select" required>
            <option value="">Select a GP</option>
            @foreach ($generalPractitioners as $gp)
                <option value="{{ $gp->id }}">{{ $gp->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection