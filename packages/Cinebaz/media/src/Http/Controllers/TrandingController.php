<?php

namespace Cinebaz\Media\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Cinebaz\Media\Models\Media;
use Cinebaz\Media\Models\Tranding;
class TrandingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['webview']]);
    }
    public function Index(){
        $fdata = Tranding::get();
        $mdata = media::where('is_active','Yes')->get();
        return View('media::tranding.index', compact('fdata','mdata'));
    }
    public function Create(Request $request){
        if ($request->ajax()) {
            $data = Media::latest()->get();
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 'Yes') {
                        return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                    } else {
                        return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                    }
                })

                ->addColumn('thumbnil', function ($data) {
                    if ($data->featured) {
                        $button = '<img src="' . asset($data->featured->full) . '" height="60px">';
                    } else {
                        $button = '';
                    }

                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '<div>';
                    $button .= '<input type="checkbox" name="video_id[]" value="'.$data->id.'">';
                    $button .= '</div>';
                    return $button;
                })

                ->rawColumns(['thumbnil', 'status', 'action'])
                ->make(true);
        }
        return view('media::tranding.create');
    }

    public function Store(Request $request){
        try{
            $attributes = [
                'video_id'      => $request->get('video_id'),
                'placement'     => $request->get('placement'),
                'start_date'    => $request->get('start_date'),
                'deadline'      => $request->get('deadline'),
            ];
            Tranding::create($attributes);
            
            return redirect()->back();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function Delete($id){
        $dltTrand = Tranding::where('id',$id)->delete();

        return redirect()->back();
    }
}
