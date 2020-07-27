<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title'  => 'required',
            'slug'  => 'required',
            'meta_title'  => 'required',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'meta_description' => 'required|string',
            'status' => 'required',
            'featured_image' => 'required'
        ];
    }
}
