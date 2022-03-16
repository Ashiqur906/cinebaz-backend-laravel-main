<?php

namespace Cinebaz\Pricing\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Pricing\Http\Requests\PricingFV;
use Cinebaz\Pricing\Models\Pricing;
use Cinebaz\Pricing\Models\Quality;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Pricing\Models\PlanHead;
use Cinebaz\Pricing\Models\AssignPlan;
use Cinebaz\Seo\Traits\TSeo;

use Illuminate\Http\Request;
use Validator;



class PricingController extends Controller
{
    use TSeo;

    public function __construct()
    {
        //$this->middleware('outlet');
    }
    public function Index()
    {
        $assignData = AssignPlan::get();
        return view('pricing::index')->with([
            'assignData' => $assignData,
            'fdata' => null,

        ]);
    }
    public function assign()
    {
        $subdata    = SubscriptionHead::where('deleted_at',Null)->get();
        $plandata   = PlanHead::where('deleted_at',Null)->get();
        return view('pricing::assign')->with([
            'subdata'   => $subdata,
            'plandata'  => $plandata,
            'fdata'     => null,

        ]);
    }
    public function DeleteAssignPlan($id){
        $dltAssign = AssignPlan::where('id',$id)->delete();

        return redirect()->back();
    }
    public function SaveAssign(Request $request)
    {

        try {
            $create = new AssignPlan();

            $create->sub_head_id    = $request->sub_head_id;
            $create->plan_head_id   = $request->plan_head_id;
            $create->quality_id     = $request->quality_id;

            $create->save();

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    public function SubHead()
    {
        $subdata = SubscriptionHead::where('deleted_at',Null)->get();
        return view('pricing::sub_hed')->with([
            'subdata' => $subdata,
            'fdata' => null,

        ]);
    }
    public function SaveSubHead(Request $request)
    {

        try {
            $create = new SubscriptionHead();

            $create->title      = $request->title;
            $create->price      = $request->price;
            $create->duration   = $request->duration;

            $create->save();

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    public function DeleteSubHead($id){
        $delete_sub = SubscriptionHead::where('id',$id)->delete();

        return redirect()->back();
    }
    ##price list(index)
    public function PlanHead()
    {
        $plandata = PlanHead::where('deleted_at',Null)->get();
        return view('pricing::plan_head')->with([
            'plandata' => $plandata,
            'fdata' => null,

        ]);
    }
    public function create()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('pricing::add')->with([
            'mdata' => null,
            'fdata' => null,

        ]);
    }
    public function PleanCreate()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('pricing::add_plan')->with([
            'mdata' => null,
            'fdata' => null,

        ]);
    }
    public function SavePlanHead(Request $request)
    {

        try {
            $create = new PlanHead();

            $create->title = $request->title;
            $create->type  = $request->plan_type;

            $create->save();

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function DeletePlanHead($id){
        $delete_plan = PlanHead::where('id',$id)->delete();

        return redirect()->back();
    }
    ##price create
    public function Pricecreate()
    {
        //$mdata = Category::where('is_active', 'yes')->get();
        return view('pricing::addprice')->with([
            'mdata' => null,
            'fdata' => null,

        ]);
    }

    ##Video Quality
    public function videoQuality()
    {
        $fdata = Quality::get();
        $mdata = null;
        return view('pricing::video_quality')->with(['fdata' => $fdata, 'mdata' => null]);
    }
    public function videoQualityAdd()
    {
        $fdata = Quality::get();
        $mdata = null;
        return view('pricing::video_quality_add')->with(['fdata' => $fdata, 'mdata' => null]);
    }
    // public function edit(Request $request, $id)
    // {
    //     $fdata = Quality::findOrFail($id);
    //     $mdata = null;
    //     return view('pricing::add')->with(['fdata' => $fdata, 'mdata' => null]);
    // }
    // ##price edit
    // public function Priceedit(Request $request, $id)
    // {
    //     $fdata = Pricing::findOrFail($id);
    //     $mdata = null;
    //     return view('pricing::add')->with(['fdata' => $fdata, 'mdata' => null]);
    // }



    public function VideoQualityStore(Request $request)
    {
        $id = $request->get('id');

        $attributes = [
            'title_en'      => $request->get('title_en'),
            'quality'       => $request->get('quality'),
            'fullname'      => $request->get('fullname'),
            'shortname'     => $request->get('shortname'),
            'remarks'       => $request->get('remarks'),
            'is_active'     => 'yes',
            'modified_by'   => auth('web')->user()->id,

        ];
        if (!$id) {

            $attributes['create_by']  = auth('web')->user()->id;
        }

        try {

            if ($id) {
                $data =  Quality::where('id', $id)->update($attributes);
            }else {
                $insert = Quality::create($attributes);
            }
            return redirect()->route('admin.videoquality.videoQuality')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
    public function QualityDelete($id){
        $dltQuality = Quality::where('id',$id)->delete();

        return redirect()->back();
    }
}
