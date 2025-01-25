<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpmMonitoringData;
use App\Models\Patient;
use Carbon\Carbon;

/**
 * @OA\Tag(
 *      name="MonitoringData",
 *      description="API Endpoints for Managing Monitoring Data"
 * )
 */

class MonitoringDataController extends Controller
{
    public function index()
    {
        $monitoringData = RpmMonitoringData::with('patient')->get();
        return view('monitoring_data.index', compact('monitoringData'));
    }

    public function create()
    {
        $sensorTypes = ['blood_glucose', 'blood_pressure', 'heart_rate'];
        $patients = Patient::all(); // Assuming patients need to be listed for selection.
        return view('monitoring_data.create', compact('sensorTypes', 'patients'));
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
        $monitoringData = RpmMonitoringData::findOrFail($id);
        $sensorTypes = ['blood_glucose', 'blood_pressure', 'heart_rate'];
        $patients = Patient::all();
        return view('monitoring_data.edit', compact('monitoringData', 'sensorTypes', 'patients'));
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

    /**
     * @OA\Get(
     *      path="/api/monitoring-data",
     *      operationId="getMonitoringData",
     *      tags={"MonitoringData"},
     *      summary="Get list of monitoring data",
     *      description="Returns list of monitoring data",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function apiIndex()
    {
        $data = MonitoringData::all();
        return response()->json($data);
    }

    /**
     * @OA\Post(
     *      path="/api/monitoring-data",
     *      operationId="createMonitoringData",
     *      tags={"MonitoringData"},
     *      summary="Create new monitoring data",
     *      description="Create new monitoring data entry",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="patient_id", type="integer"),
     *              @OA\Property(property="sensor_type", type="string"),
     *              @OA\Property(property="sensor_value", type="number"),
     *              @OA\Property(property="recorded_at", type="string", format="date-time")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation"
     *      )
     * )
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|integer',
            'sensor_type' => 'required|string',
            'sensor_value' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        $monitoringData = MonitoringData::create($validated);
        return response()->json($monitoringData, 201);
    }

    /**
     * @OA\Get(
     *      path="/api/monitoring-data/{id}",
     *      operationId="getMonitoringDataById",
     *      tags={"MonitoringData"},
     *      summary="Get monitoring data by ID",
     *      description="Returns monitoring data based on ID",
     *      @OA\Parameter(
     *          name="id",
     *          description="Monitoring data ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function apiShow($id)
    {
        $data = MonitoringData::findOrFail($id);
        return response()->json($data);
    }

    /**
     * @OA\Put(
     *      path="/api/monitoring-data/{id}",
     *      operationId="updateMonitoringData",
     *      tags={"MonitoringData"},
     *      summary="Update monitoring data",
     *      description="Update monitoring data entry",
     *      @OA\Parameter(
     *          name="id",
     *          description="Monitoring data ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="sensor_type", type="string"),
     *              @OA\Property(property="sensor_value", type="number"),
     *              @OA\Property(property="recorded_at", type="string", format="date-time")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function apiUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'sensor_type' => 'required|string',
            'sensor_value' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        $monitoringData = MonitoringData::findOrFail($id);
        $monitoringData->update($validated);
        return response()->json($monitoringData);
    }

    /**
     * @OA\Delete(
     *      path="/api/monitoring-data/{id}",
     *      operationId="deleteMonitoringData",
     *      tags={"MonitoringData"},
     *      summary="Delete monitoring data",
     *      description="Deletes monitoring data based on ID",
     *      @OA\Parameter(
     *          name="id",
     *          description="Monitoring data ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation"
     *      )
     * )
     */
    public function apiDestroy($id)
    {
        $monitoringData = MonitoringData::findOrFail($id);
        $monitoringData->delete();
        return response()->json(null, 204);
    }
}
