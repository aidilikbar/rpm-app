@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-6">Monitoring Data</h2>
            <a href="{{ route('monitoring-data.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Monitoring Data</a>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Patient</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Sensor Type</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Sensor Value</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Recorded At</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitoringData as $data)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $data->patient->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ ucfirst(str_replace('_', ' ', $data->sensor_type)) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $data->sensor_value }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $data->recorded_at }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('monitoring-data.edit', $data->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('monitoring-data.destroy', $data->id) }}" method="POST" class="inline-block">
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