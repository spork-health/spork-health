<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Measurement;
use App\Models\HealthLog;
use App\Policies\TeamPolicy;
use App\Policies\MeasurementPolicy;
use App\Policies\HealthLogPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Measurement::class => MeasurementPolicy::class,
        HealthLog::class => HealthLogPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
