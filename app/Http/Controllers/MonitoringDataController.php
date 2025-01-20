<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpmMonitoringData;
use App\Models\Patient;
use Carbon\Carbon;

class MonitoringDataController extends Controller
{
    public function index()
    {
        $monitoringData = RpmMonitoringData::with('patient')->get();
        return view('monitoring_data.index', compact('monitoringData'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('monitoring_data.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'sensor_type' => 'required|in:blood_glucose,blood_pressure,heart_rate',
            'sensor_value' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        RpmMonitoringData::create($request->all());
        return redirect()->route('monitoring-data.index')->with('success', 'Monitoring data created successfully.');
    }

    public function edit($id)
    {
        $data = RpmMonitoringData::findOrFail($id);
        $data->recorded_at = Carbon::parse($data->recorded_at);
        $patients = Patient::with('user')->get();

        // Debugging logs
        \Log::info('Data:', $data->toArray());
        \Log::info('Patients:', $patients->toArray());

        return view('monitoring_data.edit', [
            'data' => $data,
            'patients' => $patients,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'sensor_type' => 'required|in:blood_glucose,blood_pressure,heart_rate',
            'sensor_value' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        $monitoringData = RpmMonitoringData::findOrFail($id);
        $monitoringData->update($request->all());
        return redirect()->route('monitoring-data.index')->with('success', 'Monitoring data updated successfully.');
    }

    public function destroy($id)
    {
        $monitoringData = RpmMonitoringData::findOrFail($id);
        $monitoringData->delete();
        return redirect()->route('monitoring-data.index')->with('success', 'Monitoring data deleted successfully.');
    }
}
