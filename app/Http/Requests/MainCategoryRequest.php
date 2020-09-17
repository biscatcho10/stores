<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->id ,
            // 'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin\categories.required name'),
            'slug.required' => __('admin\categories.required slug'),
            'slug.unique' => __('admin\categories.unique'),
        ];
    }

}
