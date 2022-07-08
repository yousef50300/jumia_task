<?php

namespace App\Http\Requests\Backend\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:190'
        ];

        if ($this->isMethod('POST')) {
            $rules += [
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6|max:20|confirmed',
            ];
        } else {
            $rules += [
                'email' => 'required|email|unique:users,email,' . request('user')['id'],
                'password' => 'nullable|string|min:6|max:20|confirmed',
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return __('users.attributes');
    }
}
