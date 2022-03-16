<?php

namespace Cinebaz\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MediaFV extends FormRequest
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

        // dd($request->segment(2));
        $rules = [
            'slug' => 'required|max:191|unique:media,slug,' . $request->get('id'),
            'meta_title' => 'required',
        ];
        foreach (config('cz_media.lang') as $key => $list) {
            $rules['title_' . $key]         =  'required|max:191';
            $rules['short_description_' . $key]     =  'nullable|max:191';
            $rules['description_' . $key]   =  'nullable';
        }


        return $rules;
    }
}
