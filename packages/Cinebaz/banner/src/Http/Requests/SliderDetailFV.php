<?php

namespace Cinebaz\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Validator;

class SliderDetailFV extends FormRequest
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
            'slider_id' => 'required',
        ];
        if(!$this->media_id){
            $rules['image'] = 'required|mimes:jpg,jpeg,png';
            $rules['title'] = 'required';
        }
        return $rules;
    }
}
