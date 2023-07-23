<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
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

        $resource = app('request')->segment(2);
        //dd( app('request')->segment(2));

        $rules = [];

        if($resource != 'companies' && $resource != 'textblocks' && $resource != 'reviews' && $resource != 'employees') {

            $rules['name'] = 'required';
            $rules['slug'] = 'required|unique:'.$resource;
            $rules = [
                //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ];

            if ($this->method() == 'PUT') {
                $rules['slug'] = 'required|unique:'.$resource.',slug,'. app('request')->segment(3);
            }

        }

        if($resource == 'posts') {
            //$rules['section'] = 'required';
            //$rules['employee'] = 'required';
        }

        if($resource == 'posts' || $resource == 'sections') {
            $rules['description'] = 'required';
        }

        if($resource == 'categories' || $resource == 'posts' || $resource == 'sections' || $resource == 'pages') {
            $rules['seo_title'] = 'required';
            $rules['seo_description'] = 'required';
        }

        return $rules;

    }
}
