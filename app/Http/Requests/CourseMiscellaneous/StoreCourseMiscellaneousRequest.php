<?php

namespace App\Http\Requests\CourseMiscellaneous;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCourseMiscellaneousRequest extends FormRequest
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
            'course_id' => 'required|integer|exists:courses,id',
            'year_level' => 'required|integer|in:1,2,3,4',
            'semester' => 'required|integer|in:1,2',
        ];  
    }
}
