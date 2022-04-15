<?php

namespace App\Http\Requests\RegistrationFee;

use Illuminate\Foundation\Http\FormRequest;

//Facades
use Illuminate\Support\Facades\Auth;

class StoreRegistrationFeeController extends FormRequest
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
            'amount' => 'required|numeric',
        ];
    }
}
