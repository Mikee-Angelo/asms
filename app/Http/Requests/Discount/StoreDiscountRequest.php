<?php

namespace App\Http\Requests\Discount;

use Illuminate\Foundation\Http\FormRequest;

//Facades
use Illuminate\Support\Facades\Auth;

class StoreDiscountRequest extends FormRequest
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
            'discount' => 'required|integer',
            'description' => 'string|nullable', 
        ];
    }
}
