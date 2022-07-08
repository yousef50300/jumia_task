<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
            'name' => 'required|string|max:190',
            'start_destination' => 'required|exists:cities,id',
            'end_destination' => 'required|different:start_destination|exists:cities,id',
            'stops' => 'bail|nullable|array',
            'stops.*' => 'bail|required|different:start_destination||different:end_destination|exists:cities,id',
        ];
    }

    public function attributes()
    {
        return __('routes.attributes');
    }
}
