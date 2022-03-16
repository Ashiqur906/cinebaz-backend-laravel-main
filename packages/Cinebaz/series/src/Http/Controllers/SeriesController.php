<?php

namespace Cinebaz\Series\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Series\Http\Requests\SeriesFV;
use Cinebaz\Series\Models\Series;
use Illuminate\Http\Request;
use Validator;



class SeriesController extends Controller
{
    use TSeo;
    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index()
    {
        $mdata = Series::where('is_active', 'yes')->get();
        return view('series::index')->with([
            'mdata' => $mdata,
            'fdata' => null,

        ]);
    }
    public function create()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('series::add')->with([
            'mdata' => null,
            'fdata' => null,

        ]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Series::findOrFail($id);

        return view('series::add')->with(['fdata' => $fdata, 'mdata' => null]);
    }



    public function store(SeriesFV $request)
    {
        // dd(auth('web')->user()->id);
        $id = $request->get('id');

        $attributes = [
            'title_bn' => $request->get('title_bn'),
            'title_en' => $request->get('title_en'),
            'title_hn' => $request->get('title_hn'),
            'slug' => $request->get('slug'),
            'create_by' => $request->get('create_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'yes',
            'modified_by' => auth('web')->user()->id,

        ];
        if (!$id) {

            $attributes['create_by']  = auth('web')->user()->id;
        }

        try {

            if ($id) {

                $data =  Series::where('id', $id)->update($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => Series::class,
                ]);
            } else {
                $insert = Series::create($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $insert->id,
                    'able_type' => Series::class,
                ]);
            }

            return redirect()->route('admin.series.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function destroy(Request $request, $id)
    {
        //dd($id);
        $category = Series::findOrFail($id)->delete();

        return redirect()->route('admin.series.index')->with('success', 'This request has been deleted');
    }
}
