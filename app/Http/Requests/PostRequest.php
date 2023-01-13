<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:posts',
            //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'employee' => 'required',
        ];

        if ($this->method() == 'PUT') {
            $rules['slug'] = 'required|unique:posts,slug,'. app('request')->segment(2);
        }

        return $rules;
        
    }
}
