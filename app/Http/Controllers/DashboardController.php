<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Measurement;
use App\Models\MeasurementType;
use App\Models\HealthLog;

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
        $today = Carbon::now(\getenv('TZ'));
        $oneMonthAgo = Carbon::now(\getenv('TZ'))->subDays(30);
        $cholesterolTypeId = MeasurementType::where('name', 'Cholesterol')->first()->id;
        $bloodPressureTypeId = MeasurementType::where('name', 'Blood Pressure')->first()->id;

        $healthLog = HealthLog::where('team_id', $currentTeam)
            ->get()
            ->sortByDesc('log_date')
            ->last();

        $cholesterol = Measurement::where('team_id', $currentTeam)
            ->where('measurement_type_id', $cholesterolTypeId)
            ->get()
            ->filter(function ($obj) use (&$today, &$oneMonthAgo) {
                return $obj->log_date->lte($today) && $obj->log_date->gte($oneMonthAgo);
            })
            ->sortByDesc('log_date');;

        $bloodPressure = Measurement::where('team_id', $currentTeam)
            ->where('measurement_type_id', $bloodPressureTypeId)
            ->get()
            ->filter(function ($obj) use (&$today, &$oneMonthAgo) {
                return $obj->log_date->lte($today) && $obj->log_date->gte($oneMonthAgo);
            })
            ->sortByDesc('log_date');

        return view('dashboard', compact('cholesterol', 'bloodPressure', 'healthLog'));
    }
}
