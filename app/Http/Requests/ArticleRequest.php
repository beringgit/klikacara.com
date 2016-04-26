<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required|max:20|min:3',
            'body'  => 'required|min:10',
            'categories' => 'required|min:1',
            'image_header' => 'required|max:1024|mimes:jpg,jpeg,png'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'title.max' => 'Judul maksimal :max karakter',
            'title.min'  => 'Judul minimal :min karakter',
            'body.required' => 'Artikel tidak boleh kosong',
            'body.min' => 'Artikel minimal :min karakter',
            'categories.required' => 'Category diperlukan',
            'categories.min' => 'Category minimal harus :min',
            'image_header.required' => 'Image header diperlukan',
            'image_header.mimes' => 'Image header hanya boleh :mimes',
        ];
    }
}
