@extends('layouts.app')

@section('title', 'Welcome to RPM App')

@section('content')
<div class="container text-center">
    <h1 class="my-4">Welcome to the Remote Patient Monitoring System</h1>
    <p class="lead">
        Manage and monitor patient health data with ease.
    </p>

    <div class="row mt-5">
        <!-- Link to Monitoring Data -->
        <div class="col-md-6">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title">Monitoring Data</h5>
                    <p class="card-text">View and manage health data collected from patients.</p>
                    <a href="{{ route('monitoring-data.index') }}" class="btn btn-primary">View Monitoring Data</a>
                </div>
            </div>
        </div>

        <!-- Link to Profile or Other Features -->
        <div class="col-md-6">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title">Manage Patients</h5>
                    <p class="card-text">Link monitoring data to patients and manage their profiles.</p>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Manage Patients</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection