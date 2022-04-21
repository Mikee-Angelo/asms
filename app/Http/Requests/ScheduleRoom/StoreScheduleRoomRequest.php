<?php

namespace App\Http\Requests\ScheduleRoom;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreScheduleRoomRequest extends FormRequest
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
            'building' => 'required|integer|exists:buildings,id',
            'room' => 'required|integer|exists:rooms,id',
        ];
    }
}
