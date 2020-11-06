<?php

namespace App\Http\Requests;
use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'birthdate' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'Firstname is required!',
            'lastname.required' => 'Lastname is required!',
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
            'firstname' => 'trim|capitalize|escape',
            'lastname'  => 'trim|capitalize|escape',
            'birthdate' => 'trim|format_date:m/d/Y, Y-m-d',
        ];
    }

}
