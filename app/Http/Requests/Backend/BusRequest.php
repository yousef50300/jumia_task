<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'bus_number' => 'required|string|min:5|max:20|unique:buses',
            ];
        }

        return [
            'bus_number' => 'required|string|min:5|max:20|unique:buses,bus_number,'. request('bus')['id'],
        ];
    }

    public function attributes()
    {
        return __('buses.attributes');
    }
}
