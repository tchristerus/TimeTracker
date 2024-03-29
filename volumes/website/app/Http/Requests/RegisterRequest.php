<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'forename' => 'required|min:2',
            'surname' => 'required|min:2',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'password2' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password2.same' => 'Passwords do not match!',
        ];
    }
}
