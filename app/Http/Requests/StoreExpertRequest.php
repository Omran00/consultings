<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone_number' => 'required',
            'phone_number.*' => 'integer',
            'country' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'cost' => 'required|integer',
            'experience_name' => 'required',
            'experience_name.*' => 'string',
            'experience_description' => 'required',
            'experience_description.*' => 'string',
            'consulting_name' => 'required',
            'consulting_name.*' => 'required|string',
            'start_time' => 'required',
            'start_time.*' => 'required',
            'start_time.*.*' => 'date_format:H:i',
            'end_time' => 'required',
            'end_time.*' => 'required',
            'end_time.*.*' => 'date_format:H:i|after:start_time.*.*',
        ];
    }
}
