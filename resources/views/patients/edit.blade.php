@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<h1 class="h4 mb-3">Edit Patient</h1>

<form action="{{ route('patients.update', $patient->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach (\App\Models\User::where('role', 'patient')->get() as $user)
                <option value="{{ $user->id }}" {{ $user->id == $patient->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="gp_id" class="form-label">General Practitioner</label>
        <select name="gp_id" id="gp_id" class="form-select" required>
            <option value="">Select a GP</option>
            @foreach ($generalPractitioners as $gp)
                <option value="{{ $gp->id }}" {{ $gp->id == $patient->gp_id ? 'selected' : '' }}>
                    {{ $gp->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $patient->date_of_birth }}" required>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ $patient->contact_number }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" class="form-control" rows="3" required>{{ $patient->address }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection