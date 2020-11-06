<?php

namespace App\Http\Requests;
use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use SanitizesInput;

    public function validateResolved()
    {
        $this->sanitize();
        parent::validateResolved();
    }
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
            'email' => 'required|email|unique:users',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'password' => ['required','confirmed'],
            'birthdate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'firstname.required' => 'Firstname is required!',
            'lastname.required' => 'Lastname is required!',
            'password.required' => 'Password is required!',
            'birthdate.required' => 'Date of birth is required!',

        ];
    }

     /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email'     => 'trim|lowercase',
            'firstname' => 'trim|capitalize|escape',
            'lastname'  => 'trim|capitalize|escape',
            'birthdate' => 'trim|format_date:m/d/Y, Y-m-d',
        ];
    }
}
