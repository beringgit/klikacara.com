<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmailContactRequest extends Request
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
            'contact_name'  => 'min:2|required',
            'contact_email' => 'required|email',
            'contact_message'   => 'required|min:20'
        ];
    }
}
