<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Team;
use App\Models\MeasurementType;

class Measurement extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'log_date' => 'date',
        'value' => 'double',
        'measurement_type_id' => 'integer',
        'team_id' => 'integer'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['log_date', 'value', 'team_id', 'measurement_type_id'];

    public function team()
    {
        return $this->belongsto(Team::class);
    }

    public function measurementType() 
    {
        return $this->hasOne(MeasurementType::class, 'id');
    }
}
