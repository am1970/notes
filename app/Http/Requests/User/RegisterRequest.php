<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 *
 * Properties
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 *
 */
class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'email' => 'required|email|max:64|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }
}
