<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'psa' => 'boolean|nullable', 
            'sf9' => 'boolean|nullable', 
            'good_moral' => 'boolean|nullable', 
            'colored_pictures' => 'boolean|nullable', 
            'honorable_dismissal' => 'boolean|nullable', 
            'transcript_records' => 'boolean|nullable', 
            'clearance' => 'boolean|nullable', 
        ];
    }
}
