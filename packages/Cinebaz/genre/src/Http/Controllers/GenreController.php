<?php

namespace Cinebaz\Genre\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cinebaz\Genre\Http\Requests\GenreFV;
use Cinebaz\Genre\Models\Genre;
use Validator;
use DataTables;
use Cinebaz\Seo\Traits\TSeo;

class GenreController extends Controller
{
    use TSeo;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['webview']]);
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Genre::latest()->get();

            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 'Yes') {
                        return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                    } else {
                        return '<button type="button" class="edit btn btn-primary btn-sm">Inactive</button>';
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<div class="btn-group btn-group-sm">';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="lar la-question-circle"></i></button>';
                    $button .= '<a href="' . route('admin.genre.edit', $data->id) . '" class="btn btn-info btn-flat"><i class="las la-pen"></i></a>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('genre::index', compact('mdata', 'fdata'));
    }
    public function webview($slug)
    {
        $mdata = Genre::where(['slug' => $slug])->first();
        // dd($mdata);

        return view('genre::webview')
            ->with(['mdata' => $mdata]);
    }
    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('genre::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Genre::findOrFail($id);

        $mdata = null;

        return view('genre::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function store(GenreFV $request)
    {

        // dd($request);
        $id = $request->get('id');
        // store
        // $seo_id = $this->Seogenarate($request);


        $attributes = [
            'title_en' => $request->get('title_en'),
            'title_bn' => $request->get('title_bn'),
            'title_hn' => $request->get('title_hn'),
            'slug' => $request->get('slug'),
            'description_en' => $request->get('description_en'),
            'description_bn' => $request->get('description_bn'),
            'description_hn' => $request->get('description_hn'),
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
                $existing = Genre::findOrFail($id);
                Genre::where('id', $id)->update($attributes);
                $this->seoPost([
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => Genre::class,
                ]);
            } else {
                $data = Genre::create($attributes);

                $this->seoPost([
                    'data' => $request,
                    'able_id' => $data->id,
                    'able_type' => Genre::class,
                ]);
            }



            return redirect()->route('admin.genre.all')->with('success', 'Successfully save changed');
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
