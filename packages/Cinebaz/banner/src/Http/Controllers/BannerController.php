<?php

namespace Cinebaz\Banner\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cinebaz\Banner\Models\Banner;
use Cinebaz\Media\Models\Media;
use Cinebaz\Banner\Http\Requests\SliderDetailFV;
use Cinebaz\Banner\Http\Requests\SliderFV;
use Illuminate\Support\Facades\File;
use Cinebaz\Banner\Models\Slider;
use Cinebaz\Banner\DataTables\SliderDetailDT;
use Cinebaz\Banner\DataTables\SliderDT;
use Cinebaz\Media\Traits\TPicture;
use Image;
use Session;
use Validator;
use Auth;
use Cinebaz\Banner\Models\SliderDetail;

class BannerController extends Controller
{
    use TPicture;

  public function __construct()
  {
    //$this->middleware('outlet');
  }

  public function index(SliderDT $dataTable)
  {
    // dd('working');
      $mdata = null;
      $fdata = null;
      //dd($dataTable->request()->all());

      return $dataTable->render('banner::index', compact('fdata', 'mdata'));
  }

  public function details(SliderDetailDT $dataTable,$id)
  {
    // dd('working');
      $mdata = Slider::findOrFail($id);

    //   dd($mdata->details);

      $fdata = null;
      //dd($dataTable->request()->all());

      return $dataTable->render('banner::slider_details', compact('fdata', 'mdata'));
  }


  // delete controller
  public function destroy($id)
  {

    SliderDetail::findOrFail($id)->delete();
    return back()->withDeletestatus('Slider Deleted Successfully!');
  }

  // active and deactive controller
  public function deactive($id)
  {
    SliderDetail::findOrFail($id)->update([
      'read_status' => 1,
    ]);
    return back();
  }
  public function active($id)
  {
    SliderDetail::findOrFail($id)->update([
      'read_status' => 2,
    ]);
    return back();
  }

  public function add()
  {
    return view('banner::add')->with(['fdata' => null, 'mdata' => null]);
  }
  public function details_add($id)
  {
      $mdata = Slider::findOrFail($id);
    return view('banner::details_add')->with(['fdata' => null, 'mdata' => $mdata]);
  }
  public function details_edit($id)
  {
    $fdata = SliderDetail::findOrFail($id);
    //  dd($fdata->getImage);
    $mdata =$fdata->slider;

    return view('banner::details_add')->with(['fdata' => $fdata, 'mdata' => $mdata]);
  }

  // banner edit controller
  public function edit(Request $request, $id)
  {
    $fdata = Slider::findOrFail($id);
    $mdata =$fdata->slider;
    return view('banner::add')->with(['fdata' => $fdata, 'mdata' => $mdata]);
  }



  public function store(SliderFV $request)
  {

    // dd($request);
    $id = $request->get('id');
    $attributes = [
        'title'            => $request->title,
        'slug'             => $request->slug,
        'remarks'           => $request->get('remarks'),
        'sort_by'           => $request->get('sort_by'),
        'is_active'         => $request->get('is_active') ? $request->get('is_active') : 'No',
        'modified_by'       => auth('web')->user()->id,
    ];

    try {

        if($id){

            $existing = Slider::findOrFail($id);
            $sumbit  = Slider::where('id', $id)->update($attributes);
            $message = 'Slider Update Successfully';

        }else{
            $attributes['create_by']  = auth('web')->user()->id;
            $insert = Slider::create($attributes);
            $message = 'Slider Inserted Successfully';
        }
        return redirect()->route('admin.slider.index')->withStatus($message);
    } catch (\Illuminate\Database\QueryException $ex) {
        return redirect()->back()->withErrors($ex->getMessage())
            ->with('myexcep', $ex->getMessage())->withInput();
    }
  }
  public function store_details(SliderDetailFV $request)
  {

    // dd($request);
    $id = $request->get('id');


    $attributes = [
        'slider_id'         => $request->slider_id,
        'media_id'          => $request->media_id,
        'title'             => $request->title,
        'description'       => $request->description,
        'button'            => $request->button,
        'button_link'       => $request->button_link,
        'remarks'           => $request->get('remarks'),
        'sort_by'           => $request->get('sort_by'),
        'is_active'         => $request->get('is_active') ? $request->get('is_active') : 'No',
        'modified_by'       => auth('web')->user()->id,
    ];

    try {

        if($id){

            $existing = SliderDetail::findOrFail($id);
            $sumbit  = SliderDetail::where('id', $id)->update($attributes);
            if($request->file('image')){
                $this->uploadImage([
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => SliderDetail::class,
                    'file' => 'image', //(Default image)
                    'file_id' => isset($existing->getImage->id)? $existing->getImage->id:null, // Only for update else value will be null
                    'size' => null, //square,Portrait (Default Landscape)
                    'folder' => 'slider' //(Default dropzon)
                ]);
            }

            $message = 'Slider Update Successfully';

        }else{
            $attributes['create_by']  = auth('web')->user()->id;
            $insert = SliderDetail::create($attributes);
            if($request->file('image')){
                $this->uploadImage([
                    'data' => $request,
                    'able_id' => $insert->id,
                    'able_type' => SliderDetail::class,
                    'file' => 'image', //(Default image)
                    'file_id' => null,
                    'size' => null, //square,Portrait (Default Landscape)
                    'folder' => 'slider' //(Default dropzon)
                ]);
            }
            $message = 'Slider Inserted Successfully';
        }
        return redirect()->route('admin.slider.details', $request->slider_id )->withStatus($message);
    } catch (\Illuminate\Database\QueryException $ex) {
        return redirect()->back()->withErrors($ex->getMessage())
            ->with('myexcep', $ex->getMessage())->withInput();
    }







  }
  // banner list view
  public function view()
  {
    $banners = SliderDetail::all();
    return view('banner::list', compact('banners'));
  }

  // banner title part
  public function title(Request $request)
  {
    Slider::insert([
      'name'        => $request->name,
      'added_by'    => Auth::id(),
      'created_at'  => Carbon::now(),
    ]);
    return back();
  }

//   Add placement
  public function placement(){
    return view('banner::placement');
  }
}
