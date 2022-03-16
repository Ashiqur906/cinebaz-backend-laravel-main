<?php

namespace Cinebaz\frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Pricing\Http\Requests\PricingFV;
use Cinebaz\Pricing\Models\AssignPlan;
use Cinebaz\Pricing\Models\PlanHead;
use Cinebaz\Pricing\Models\Pricing;
use Cinebaz\Pricing\Models\Purchase;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Seo\Traits\TSeo;
use Illuminate\Http\Request;
use Validator;



class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:member');
    }
    public function Index($id)
    {

        $plan = SubscriptionHead::findOrFail($id);
        // dd($plan);

        // dd($id);
        $mdata['mdata']   = $plan;
        $mdata['member']   = auth('member')->user();

        return view('frontend::page.purchase')->with($mdata);
    }
    public function Index2($id)
    {

        //dd($id);
        return auth('web')->user()->id;
        try {
            $create = new Purchase();

            $create->member_id          = auth('web')->user()->id;
            $create->subscription_id    = $id;
            $create->purchase_date      = date('Y-m-d');
            $create->deadline           = $request->quality_id;
            $create->status             = $request->quality_id;

            $create->save();

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }
    }
}
