<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|mimes:jpg,bmp,png',
            'main_image' => 'required|mimes:jpg,bmp,png',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
//            'tag_ids.*' => 'nullable|array|exists:tags,id',

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'This field is required',
            'title.string'=>'Incorrect format(type can be only string)',
            'preview_image.required'=>'This field is required',
            'preview_image.mimes:jpg,bmp,png'=>'Please,choose the file',
            'main_image.required'=>'This field is required',
            'main_image.mimes:jpg,bmp,png'=>'Please,choose the file',
            'category_id.required'=>'This field is required',
            'category_id.integer'=>'category_id can be only integer',
            'category_id.exists'=>'category_id it should be in DB',
            'tag_ids.array'=>'need to send an array of data',

        ];
    }
}
