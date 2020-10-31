<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasurementFormRequest extends FormRequest
{
    /**
     * Authorization is handled using policies and
     * not here so we are always returning true.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to a measurement
     * log request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'measurement_type_id' => 'required|exists:measurement_types,id',
            'team_id' => 'required|exists:teams,id',
            'log_date' => 'required|date',
            'value' => 'required|numeric'
        ];
    }
}
