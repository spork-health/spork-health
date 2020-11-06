<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\HealthLog;
use App\Http\Requests\HealthLogFormRequest;

class HealthLogController extends Controller
{
    /**
     * Enforces the health log policy.
     */
    public function __construct()
    {
        $this->authorizeResource(HealthLog::class);
    }

    /**
     * Display a listing of health logs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthLogs = HealthLog::where('team_id', Auth::user()->currentTeam->id)
            ->orderBy('log_date', 'DESC')
            ->paginate(10);

        return view('health-logs.index', compact('healthLogs'));
    }

    /**
     * Show the form for creating a new health log.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todaysDate = new \DateTime('now', new \DateTimeZone(\getenv('TZ')));
        $todaysDate->setTimestamp(time());
        $todaysDate = $todaysDate->format('Y-m-d');

        return view('health-logs.create', compact('todaysDate'));
    }

    /**
     * Store a newly created health log.
     *
     * @param  HealthLogFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthLogFormRequest $request)
    {
        $attributes = $request->validated();

        HealthLog::create($attributes);

        return redirect('/health-logs/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('health-logs.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('health-logs.edit');
    }

    /**
     * Update the specified health log.
     *
     * @param  HealthLogFormRequest $request
     * @param  HealthLog $healthLog
     * @return \Illuminate\Http\Response
     */
    public function update(HealthLogFormRequest $request, HealthLog $healthLog)
    {
        $attributes = $request->validated();

        $healthLog->update($attributes);

        return redirect('/health-log/' . $healthLog->id);
    }

    /**
     * Remove a health log from the database.
     *
     * @param  HealthLog  $healthLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthLog $healthLog)
    {
        $healthLog->delete();

        return redirect('/health-log/');
    }
}
