<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseRequest extends FormRequest
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
            'department_id' =>'required|integer', 
            'code' => 'required|string',
            'course_name' => 'required|string', 
            'type' => 'required|integer',
            'status' => 'integer', 
            //
        ];
    }
}
