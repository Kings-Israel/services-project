<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required',
            'location_lat' => 'required',
            'location_long' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Enter title',
            'price.required' => 'Enter price',
            'location_lat.required' => 'Enter location lat',
            'location_long.required' => 'Enter location long',
        ];
    }
}
