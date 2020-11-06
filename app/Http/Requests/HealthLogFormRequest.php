<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthLogFormRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'team_id' => 'required|exists:teams,id',
            'log_date' => 'required|date',
            'text' => 'required|string'
        ];
    }
}
