<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('gp', 'user')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $users = User::where('role', 'patient')->get();
        $gps = User::where('role', 'general_practitioner')->get(); // Fetch general practitioners
    
        return view('patients.create', compact('users', 'gps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'gp_id' => 'required|exists:users,id',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        //$generalPractitioners = User::where('role', 'general_practitioner')->get();
        //return view('patients.edit', compact('patient', 'generalPractitioners'));

        //$users = User::where('role', 'patient')->get();
        $gps = User::where('role', 'general_practitioner')->get(); // Fetch general practitioners
    
        return view('patients.edit', compact('patient', 'gps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'gp_id' => 'required|exists:users,id',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
