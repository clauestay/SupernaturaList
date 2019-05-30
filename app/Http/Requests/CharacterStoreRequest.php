<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'slug' => 'required|unique:characters,slug,' . $this->character,
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'seasons' => 'required|array',
            'body' => 'required',
            'status' => 'required|in:DRAFT,PUBLISHED',
        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);

            return $rules;

    }
}
