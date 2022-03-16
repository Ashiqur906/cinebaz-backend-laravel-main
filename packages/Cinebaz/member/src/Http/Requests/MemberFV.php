<?php

namespace Cinebaz\Member\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MemberFV extends FormRequest
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

        return [
            'name'      => 'required',
            'email'     => 'required|email|max:191|unique:members,email,' . $request->get('id'),
            'phone'     => 'required|max:191|unique:members,phone,' . $request->get('id'),
            'password'  => 'required|max:191|min:6',
            'gender'    => 'required',
        ];
    }
}
