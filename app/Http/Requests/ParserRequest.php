<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:256',
            'description' => 'required|max:1000',
            'link' => 'max:1000',
            'category' => 'required|min:3|max:128',
        ];
    }
}
