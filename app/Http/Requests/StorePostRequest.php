<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|min:3',
            'description' => 'required|min:3',
            'user_id' => ['required','exists:users,id'],
            'postPhoto' => 'mimes:jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'user_id.required' => 'please select a user',
            'user_id.exists' => 'please select a valid user',
            'postPhoto.mimes'=>'please upload jpg or png only',
        ];
    }
}
