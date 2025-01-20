@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-6">Edit Patient</h2>
            
            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- User Name -->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-medium mb-2">User Name</label>
                    <select name="user_id" id="user_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a User</option>
                        @foreach (\App\Models\User::where('role', 'patient')->get() as $user)
                            <option value="{{ $user->id }}" {{ $patient->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- General Practitioner -->
                <div class="mb-4">
                    <label for="gp_id" class="block text-gray-700 font-medium mb-2">General Practitioner</label>
                    <select name="gp_id" id="gp_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a GP</option>
                        @foreach ($gps as $gp)
                            <option value="{{ $gp->id }}" {{ $patient->gp_id == $gp->id ? 'selected' : '' }}>
                                {{ $gp->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $patient->date_of_birth }}" class="w-full border-gray-300 rounded-md">
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
                    <select name="gender" id="gender" class="w-full border-gray-300 rounded-md">
                        <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Contact Number -->
                <div class="mb-4">
                    <label for="contact_number" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" value="{{ $patient->contact_number }}" class="w-full border-gray-300 rounded-md">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                    <textarea name="address" id="address" rows="3" class="w-full border-gray-300 rounded-md">{{ $patient->address }}</textarea>
                </div>

                <!-- Actions -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                    <a href="{{ route('patients.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection