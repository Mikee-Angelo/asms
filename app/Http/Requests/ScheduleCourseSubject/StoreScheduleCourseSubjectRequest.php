<?php

namespace App\Http\Requests\ScheduleCourseSubject;

use Illuminate\Foundation\Http\FormRequest;

//Models
use Illuminate\Support\Facades\Auth;

class StoreScheduleCourseSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'day_type' => 'required|string', 
            'starts_at' => 'required|string',
            'ends_at' => 'required|string', 
            'course_subject_id' => 'required|exists:course_subjects,id',
        ];
    }
}
