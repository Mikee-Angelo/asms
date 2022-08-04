<?php

namespace App\Http\Requests\Pricing;

use Illuminate\Foundation\Http\FormRequest;

class StorePricingRequest extends FormRequest
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
            //
            'course' => 'required|array',
            'lec_price' => 'required|integer', 
            'lab_price' => 'required|integer', 
        ];
    }
}
