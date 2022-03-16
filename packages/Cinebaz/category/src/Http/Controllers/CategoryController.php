<?php

namespace Cinebaz\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Category\Http\Requests\CategoryFV;
use Cinebaz\Category\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Category\Traits\TPicture;

class CategoryController extends Controller
{
    use TSeo;
    use TPicture;
    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index()
    {
        $mdata = Category::where('is_active', 'yes')->get();
        return view('category::index')->with([
            'mdata' => $mdata,
            'fdata' => null,

        ]);
    }
    public function create()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('category::add')->with([
            'fdata' => null,
            'mdata' => null

        ]);
    }


    public function edit(Request $request, $id)
    {
        $fdata = Category::findOrFail($id);

        return view('category::add')->with(['fdata' => $fdata, 'mdata' => null]);
    }
    public function store(CategoryFV $request)
    {
        //dd($request);
        //return $request;
        $id = $request->get('id');
        // $seo_id = $this->Seogenarate($request);
        $attributes = [
            'title_english'     => $request->get('title_english'),
            'title_bangla'      => $request->get('title_bangla'),
            'title_hindi'       => $request->get('title_hindi'),
            'slug'              => $request->get('slug'),
            
            'category_nature'   => $request->get('category_nature'),
            'page_show'         => $request->get('page_show'),
            'is_active'         => $request->get('is_active') ? $request->get('is_active') : 'yes',
            'modified_by'       => auth('web')->user()->id,
        ];
        if (!$id) {
            $attributes['create_by']  = auth('web')->user()->id;
        }
        try {
            if ($id) {
                $data =  Category::where('id', $id)->update($attributes);
                $this->seoPost([
                    'data'      => $request,
                    'able_id'   => $id,
                    'able_type' => Category::class,
                ]);
                $abledata = [
                    'data'          => $request,
                    'able_id'       => $id,
                    'able_type'     => Category::class,
                ];
                $this->imgUpload($abledata);
            } else {
                $insert = Category::create($attributes);
                $this->seoPost([
                    'data'      => $request,
                    'able_id'   => $insert->id,
                    'able_type' => Category::class,
                ]);
                $abledata = [
                    'data'          => $request,
                    'able_id'       => $insert->id,
                    'able_type'     => Category::class,
                ];
                $this->imgUpload($abledata);
            }
            return redirect()->route('admin.category.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'This request has been deleted');
    }
}
