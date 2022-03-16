<?php

namespace Cinebaz\Season\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Season\Http\Requests\SeasonFV;
use Cinebaz\Season\Models\Season;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Series\Models\Series;
use Illuminate\Http\Request;
use Validator;



class SeasonController extends Controller
{
    use  TSeo;
    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index()
    {
        $mdata = Season::where('is_active', 'yes')->get();
        $series = Series::where('is_active', 'yes')->get();
        return view('season::index')->with([
            'series' => $series,
            'mdata' => $mdata,
            'fdata' => null,

        ]);
    }
    public function create()
    {
        $series = Series::where('is_active', 'yes')->get();
        return view('season::add')->with([
            'series' => $series,
            'fdata' => null,
            'mdata' => null,

        ]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Season::findOrFail($id);
        $series = Series::where('is_active', 'yes')->get();

        return view('season::add')->with(['fdata' => $fdata, 'series' => $series, 'mdata' => null]);
    }


    public function store(SeasonFV $request)
    {
        //dd($request);
        $id = $request->get('id');

        $attributes = [
            'series_id' => $request->get('series_id'),
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

                $data =  Season::where('id', $id)->update($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => Season::class,
                ]);
            } else {
                $insert = Season::create($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $insert->id,
                    'able_type' => Season::class,
                ]);
            }

            return redirect()->route('admin.season.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function destroy(Request $request, $id)
    {
        //dd($id);
        $season = Season::findOrFail($id)->delete();

        return redirect()->route('admin.season.index')->with('success', 'This request has been deleted');
    }
}
