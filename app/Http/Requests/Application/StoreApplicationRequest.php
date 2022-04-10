<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'course_id' => 'required|integer|exists:courses,id',
            'year_level' => 'required|integer|in:1,2,3,4',
            'application_type' => 'required|integer|in:1,2',
            'last_name' => 'required|string', 
            'first_name' => 'required|string', 
            'middle_name' => 'nullable|string',
            'birthday' => 'required|date',
            'mobile_no' => 'required|digits:11|string|numeric',
            'gender' => 'required|in:male,female',
            'register_email' => 'required|string|email:rfc,dns',
            'facebook_link' => 'required|string',
            'home_address' => 'required|string', 
            'present_address' => 'required|string', 
            'mother' => 'required|string', 
            'mother_occupation' => 'required|string', 
            'father' => 'required|string',
            'father_occupation' => 'required|string',
            'guardian' => 'required|string', 
            'guardian_contact_no' => 'required|digits:11|string|numeric',
            'guardian_relationship' => 'required|string',
            'primary_school' => 'required|string',
            'primary_graduated' => 'required|date',
            'secondary_school' => 'required|string',
            'secondary_graduated' => 'required|date',
            'senior_school_name' => 'nullable|string',
            'strand' => 'nullable|string',
            'senior_graduated' => 'nullable|date',
            'tertiary_school' => 'string|nullable',
            'tertiary_graduated' => 'nullable|date',
            'last_school_date' => 'required|date',
            'mental_illness' => 'required|boolean',
            'hearing_defects' => 'required|boolean',
            'physical_disability' => 'required|boolean',
            'chronic_illness' => 'required|boolean',
            'interfering_illness' => 'required|boolean',
            'allergies' => 'required|boolean',
        ];
    }
}
