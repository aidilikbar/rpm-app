@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-6">Add Patient</h2>
            <form action="{{ route('patients.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-medium mb-2">User</label>
                    <select name="user_id" id="user_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a User</option>
                        @foreach(\App\Models\User::where('role', 'patient')->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="gp_id" class="block text-gray-700 font-medium mb-2">General Practitioner</label>
                    <select name="gp_id" id="gp_id" class="w-full border-gray-300 rounded-md">
                        <option value="">Select a General Practitioner</option>
                        @foreach($gps as $gp)
                            <option value="{{ $gp->id }}">{{ $gp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
                    <select name="gender" id="gender" class="w-full border-gray-300 rounded-md">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="contact_number" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" class="w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                    <textarea name="address" id="address" rows="3" class="w-full border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                    <a href="{{ route('patients.index') }}" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection