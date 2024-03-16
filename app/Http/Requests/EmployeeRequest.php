<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'nip' => 'nullable|string|unique|max:100',
            'year_birth' => 'required',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'required|number',
            'religion' => 'required|string',
            'status' => 'required|boolean',
            'id_card_photo' => 'nullable|image|mimes:jpg,png|max:2048'
        ];
    }
}
