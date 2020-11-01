<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Measurement;
use App\Models\MeasurementType;

class DashboardController extends Controller
{
    /**
     * See the dashboard page.
     *
     * @return Response
     */
    public function view()
    {
        $currentTeam = Auth::user()->currentTeam->id;
        $cholesterolTypeId = MeasurementType::where('name', 'Cholesterol')->first()->id;
        $bloodPressureTypeId = MeasurementType::where('name', 'Blood Pressure')->first()->id;

        $cholesterol = Measurement::where(
            'team_id', $currentTeam
        )->orderBy(
            'log_date', 'desc'
        )->where(
            'measurement_type_id', $cholesterolTypeId
        )->get();
        
        $bloodPressure = Measurement::where(
            'team_id', $currentTeam
        )->orderBy(
            'log_date', 'desc'
        )->where(
            'measurement_type_id', $bloodPressureTypeId
        )->get();

        return view('dashboard', compact('cholesterol', 'bloodPressure'));
    }
}
