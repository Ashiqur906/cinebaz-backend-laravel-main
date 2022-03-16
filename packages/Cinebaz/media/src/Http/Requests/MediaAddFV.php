<?php

namespace Cinebaz\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MediaAddFV extends FormRequest
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
    public function rules(Request $request)
    {

        $rules = [
            'title' => 'required',

            'slug' => 'required|max:191|unique:media,slug,' . $request->get('id'),
        ];
        
        return $rules;
        // dd($rules);
    }
}
