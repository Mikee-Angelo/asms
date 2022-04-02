<?php

namespace App\Http\Requests\Manage;

use Illuminate\Foundation\Http\FormRequest;

class StoreManageRequest extends FormRequest
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

            //Course
            'view_course' => 'string',
            'add_course' => 'string',
            'delete_course' => 'string',
            'edit_course' => 'string',

            //Subjects
            'view_subjects' => 'string',
            'add_subjects' => 'string',
            'delete_subjects' => 'string',
            'edit_subjects' => 'string',

            //Students
            'view_students' => 'string',
            'add_students' => 'string',
            'delete_students' => 'string',
            'edit_students' => 'string',

             //Applications
            'view_applications' => 'string',
            'add_applications' => 'string',
            'delete_applications' => 'string',
            'edit_applications' => 'string',

            //Pricings
            'view_pricings' => 'string',
            'add_pricings' => 'string',
            'delete_pricings' => 'string',
            'edit_pricings' => 'string',

            //Roles
            'view_roles' => 'string',
            'add_roles' => 'string',
            'delete_roles' => 'string',
            'edit_roles' => 'string',

        ];
    }
}
