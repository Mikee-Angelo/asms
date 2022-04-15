<?php

namespace App\Http\Requests\Miscellaneous;

use Illuminate\Foundation\Http\FormRequest;

//Facades
use Illuminate\Support\Facades\Auth;

class StoreMiscellaneousRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric'
        ];
    }
}
