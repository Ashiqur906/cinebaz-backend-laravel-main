<?php

namespace Cinebaz\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cinebaz\Setting\Http\Requests\SettingFV;
use Cinebaz\Setting\Models\Setting;
use Validator;


class SettingController extends Controller
{

    public function __construct()
    {
        // $this->middleware('admin');
    }
    public function index()
    {
        // $Setting = [];

        $mdata = Setting::get();

        // dd($mdata);

        return view('setting::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }
    public function menu()
    {
        // $Setting = [];

        $mdata = null;
        return view('setting::menu')->with(['fdata' => null, 'mdata' => $mdata]);
    }
    public function store(SettingFV $request)
    {



        $id = $request->get('id');
        // store
        $attributes = [
            'key' => $request->get('key'),
            'display_name' => $request->get('display_name'),
            'value' => $request->get('value'),
            'details' => $request->get('details'),

            'type' => $request->get('type'),
            'order' => ($request->get('order')) ? $request->get('order') : 1,
            'group' => $request->get('group')

        ];

        // dd($attributes);


        try {

            Setting::create($attributes);

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            // return $ex->getMessage();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
    public function update(Request $request)
    {

        $fdata = $request->all();
        unset($fdata['_token']);




        try {

            foreach ($fdata as $key => $data) {
                //


                if ($request->hasFile($key) || $request->file($key)) {

                    $file = $request->file($key);
                    $destinationPath = public_path('uploads/setting');
                    $filename = microtime() . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                    $file_location = 'uploads/setting/' . $filename;
                    Setting::where('key', $key)->update(['value' => $file_location]);
                } else {

                    Setting::where('key', $key)->update(['value' => $data]);
                }
            }
            // dd('dd');

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            // return $ex->getMessage();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
    public function licence(Request $request)
    {
        return view('Setting::licence');
    }
}
