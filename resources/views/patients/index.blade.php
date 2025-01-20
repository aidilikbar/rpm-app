@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-6">Patients</h2>
            <a href="{{ route('patients.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Patient</a>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Date of Birth</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Gender</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Contact Number</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Address</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Generap Practitioners</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->date_of_birth }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst($patient->gender) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->contact_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->address }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->gp->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('patients.edit', $patient->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection