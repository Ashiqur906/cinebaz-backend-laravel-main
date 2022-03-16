<?php

namespace Cinebaz\Tag\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Tag\Http\Requests\TagFV;
use Cinebaz\Tag\Models\Tag;
use Illuminate\Http\Request;
use Validator;



class TagController extends Controller
{
    use TSeo;

    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index()
    {
        $mdata = Tag::where('is_active', 'yes')->get();
        return view('tag::index')->with([
            'mdata' => $mdata,
            'fdata' => null,

        ]);
    }
    public function create()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('tag::add')->with([
            'mdata' => null,
            'fdata' => null,

        ]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Tag::findOrFail($id);
        $mdata = null;
        return view('tag::add')->with(['fdata' => $fdata, 'mdata' => null]);
    }



    public function store(TagFV $request)
    {
        $id = $request->get('id');

        $attributes = [
            'title_bn' => $request->get('title_bn'),
            'title_en' => $request->get('title_en'),
            'title_hn' => $request->get('title_hn'),
            'slug'   => $request->get('slug'),
            'create_by' => $request->get('create_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'yes',
            'modified_by' => auth('web')->user()->id,

        ];
        if (!$id) {

            $attributes['create_by']  = auth('web')->user()->id;
        }

        try {

            if ($id) {
                //dd('edit');
                $data =  Tag::where('id', $id)->update($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => Tag::class,
                ]);
            } else {
                // dd($attributes);
                $insert = Tag::create($attributes);
                // dd($insert);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $insert->id,
                    'able_type' => Tag::class,
                ]);
            }

            return redirect()->route('admin.tag.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function destroy(Request $request, $id)
    {
        //dd($id);
        $category = Tag::findOrFail($id)->delete();

        return redirect()->route('admin.tag.index')->with('success', 'This request has been deleted');
    }
}
