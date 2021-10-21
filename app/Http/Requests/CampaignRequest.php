<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',
            'total_budget' => 'required|numeric|gt:0',
            'daily_budget' => 'required|numeric|gt:0',
            'images' => 'required|array',
            'images.*' => 'required|image',
        ];
    }
}
