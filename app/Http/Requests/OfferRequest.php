<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [// 'name' => 'required|min:5|max:255'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'price_en'               => 'required',
            'price_uk'               => 'required',
            'image_path'             => [
                'required',
                Rule::dimensions()->maxHeight(256)->maxWidth(352),
            ],
            'heading_en'             => 'required',
            'heading_uk'             => 'required',
            'partial_description_en' => 'required',
            'partial_description_uk' => 'required',
            'full_description_en'    => 'required',
            'full_description_uk'    => 'required',
            'order_number'           => 'required',
            'is_read_more'           => 'required',
            'is_home_page'           => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [//
        ];
    }
}
