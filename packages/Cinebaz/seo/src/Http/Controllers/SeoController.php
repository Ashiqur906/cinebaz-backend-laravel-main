<?php

namespace Cinebaz\Seo\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Seo\DataTables\SeoDT;
use Illuminate\Http\Request;
use Cinebaz\Seo\Http\Requests\SeoFV;
use Cinebaz\Seo\Models\Seo;
use Validator;
use DataTables;
use Cinebaz\Seo\Traits\TSeo;

class SeoController extends Controller
{
    use TSeo;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['webview']]);
    }
    public function index(SeoDT $dataTable)
    {
        $mdata = null;
        $fdata = null;
        //dd($dataTable->request()->all());

        return $dataTable->render('seo::index', compact('fdata', 'mdata'));
    }
    public function webview($slug)
    {
        $mdata = Seo::where(['slug' => $slug])->first();
        // dd($mdata);

        return view('seo::webview')
            ->with(['mdata' => $mdata]);
    }
    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('seo::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Seo::findOrFail($id);
        $mdata = null;

        return view('seo::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function store(SeoFV $request)
    {

        // dd($request);
        $id = $request->get('id');
        // store
        // $seo_id = $this->Seogenarate($request);


        $attributes = [
            'title' => $request->get('title'),
            'meta_title' => $request->get('meta_title'),
            'meta_description' => $request->get('meta_description'),
            'meta_keywords' => $request->get('meta_keywords'),
            'canonical_tag' => $request->get('canonical_tag'),
            'meta_type' => $request->get('meta_type'),
            'meta_image' => $request->get('meta_image'),
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by' => auth('web')->user()->id,
        ];

        if (!$id) {
            $attributes['create_by']  = auth('web')->user()->id;
        }
        //dump($id);

        try {
            if ($id) {
                $existing = Seo::findOrFail($id);
                Seo::where('id', $id)->update($attributes);
            } else {
                $data = Seo::create($attributes);
            }
            return redirect()->route('admin.seo.all')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function getslug(Request $request)
    {

        $search = [
            'slug' => $request->get('slug'),
            'table' => $request->get('table'),
            'column' => $request->get('column'),
            'id' => $request->get('id'),
        ];

        $getslug = dynamicslug($search);
        return response()->json(['slug' => $getslug]);
    }
}
