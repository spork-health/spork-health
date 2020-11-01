<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Measurement;
use App\Models\MeasurementType;
use App\Http\Requests\MeasurementFormRequest;

class MeasurementsController extends Controller
{
    /**
     * Enforces the measurement policy.
     */
    public function __construct()
    {
        $this->authorizeResource(Measurement::class);
    }

    /**
     * Display a listing of Measurements.
     *
     * @return Response
     */
    public function index()
    {
        $measurements = Measurement::latest()->where(
            'team_id', Auth::user()->currentTeam->id
        )->orderBy(
            'log_date', 'desc'
        )->paginate(10);

        return view('measurements.index', compact('measurements'));
    }

    /**
     * Show the forms for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $measurementTypes = MeasurementType::orderBy('name')->get();
        $todaysDate = date('Y-m-d');
        
        return view('measurements.create', compact('measurementTypes', 'todaysDate'));
    }

    /**
     * Stores a newly created measurement.
     *
     * @param MeasurementFormRequest $request
     * @return Response
     */
    public function store(MeasurementFormRequest $request)
    {
        $attributes = $request->validated();

        Measurement::create($attributes);

        return redirect('/measurements/');
    }

    /**
     * Displays a measurement specifics.
     *
     * @param Measurement $measurement
     * @return Response
     */
    public function show(Measurement $measurement)
    {
        return view('measurements.show', compact('measurement'));
    }

    /**
     * Show the forms for editing a measurement.
     *
     * @param Measurement $measurement
     * @return Response
     */
    public function edit(Measurement $measurement)
    {
        return view('measurements.edit', compact('measurement'));
    }

    /**
     * Update the measurement in the database.
     *
     * @param MeasurementFormRequest $request
     * @param Measurement $measurement
     * @return Response
     */
    public function update(MeasurementFormRequest $request, Measurement $measurement)
    {
        $attributes = $request->validated();

        $measurement->update($attributes);

        return redirect('/measurements/' . $measurement->id);
    }

    /**
     * Remove the measurement from the database.
     *
     * @param Measurement $measurement
     * @return Response
     * @throws Exception
     */
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return redirect('/measurements/');
    }
}
