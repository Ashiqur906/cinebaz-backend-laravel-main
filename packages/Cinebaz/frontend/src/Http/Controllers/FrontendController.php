<?php

namespace Cinebaz\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Banner\Models\Banner;
use Cinebaz\Category\Models\Category;
use Cinebaz\Media\Models\Media;
use Cinebaz\Member\Models\Member;
use Cinebaz\Media\Models\PlayListLog;
use Cinebaz\Media\Models\MediaFavorite;
use Cinebaz\Media\Models\MediaListing;
use Cinebaz\Media\Models\MediaSimilar;
use Cinebaz\Pricing\Models\Pricing;
use Cinebaz\Pricing\Models\Quality;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Pricing\Models\PlanHead;
use Cinebaz\Pricing\Models\AssignPlan;
use Cinebaz\Media\Models\Tranding;
use Cinebaz\Media\Models\TopTen;
use Cinebaz\Season\Models\Season;
use Cinebaz\Genre\Models\Genre;
use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use App\Notifications\MemberNotification;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('auth:member', ['except' => ['index', 'category','mediaList','TVShow','plan','season','series','details','generMediaList']]);
    }
    public function index()
    {
        $mdata['slider'] = Banner::where(['name_id' => 1])->get();
        $mdata['secound_slider'] = Banner::inRandomOrder()->take(1)->get();
        $member = auth('member')->user();
        //dump($mdata['slider']);
        $mdata['upcoming']['name'] = 'Upcoming Movies';
        $mdata['upcoming']['data'] = Media::where('published_status','0')->get();

        if ($member) {
            $mdata['favorites']['name'] = 'Your Favorites';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Your Listing';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['listing']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }
        if ($member) {
            $mdata['history']['name'] = 'Play History';
            $mdata['history']['data'] = PlayListLog::where(['member_id' => $member->id])
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->unique('video_id');
            $mdata['member']['history'] = $mdata['history']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['history']['name'] = null;
            $mdata['history']['data'] = null;
            $mdata['member']['history'] = [];
        }
        if ($member) {
            $mdata['sdata']['name'] = 'Suggested For You';
            $mdata['suggested']['data'] = PlayListLog::where(['member_id' => $member->id])
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->unique('video_id');
            if($mdata['suggested']['data']){
                $mdata['sdata']['data'] = $mdata['suggested']['data'];
            }else{
                $mdata['sdata']['data'] = Media::orderby('id','DESC')->get();
            }
            
            // $mdata['member']['suggested'] = $mdata['suggested']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['sdata']['name'] = 'Suggested For You';
            $mdata['sdata']['data'] = Media::orderby('id','DESC')->get();
            $mdata['suggested']['data'] = [];
        }

        //return $mdata['member']['suggested'];
        // $mdata['suggested']['name']     = 'Suggested For You';
        // $mdata['suggested']['data']     = Media::orderby('id','DESC')->get();

        $mdata['trending']['name']      = 'Trending';
        $mdata['trending']['data']      = Tranding::where('start_date', '<=', date('Y-m-d'))
            ->where('deadline', '>=', date('Y-m-d'))
            ->inRandomOrder()
            ->take(1)
            ->get();

        $mdata['toten']['name']  = 'TopTen';
        $mdata['toten']['data']  = TopTen::where('start_date', '<=', date('Y-m-d'))
            ->where('deadline', '>=', date('Y-m-d'))
            ->get();

        $test = Media::where('id', 3)->first();
        // dd($mdata);
        $mdata['get_trand_info']        = new Tranding;
        $mdata['categories']['name']    = "Categories";
        $mdata['categories']['data']    = Category::where('page_show',1)->get();

        return view('frontend::index')->with($mdata);
    }
    
    public function category()
    {
        $member = auth('member')->user();
        $mdata['categories']    = Category::where('category_nature',1)->where('page_show',1)->get();
        $mdata['cat_slider']    = Media::where('video_nature_id',1)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
        // $mdata['categories'] = Category::where('menu_show', true)->get();

        if ($member) {
            $mdata['favorites']['name'] = 'Your Favorites';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Your Listing';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }
        $fdata['fdata'] = null;

        return view('frontend::category')->with($mdata);
    }
    public function mediaList($id){
        $mdata['cat']    = Category::where('id',$id)->first();
        $member = auth('member')->user();
        if ($member) {
            $mdata['favorites']['name'] = 'Your Favorites';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Your Listing';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }
        return view('frontend::page.list_page')->with($mdata);
    }
    public function generMediaList($id){
        $mdata['gener_media_list'] = Genre::where('id',$id)->first();
        return view('frontend::page.gener_media_list')->with($mdata);
    }
    public function TVShow(){
        $member = auth('member')->user();
        if ($member) {
            $mdata['favorites']['name'] = 'Your Favorites';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Your Listing';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }
        $mdata['categories']    = Category::where('category_nature',2)->where('page_show',1)->get();
        $mdata['cat_slider']    = Media::where('video_nature_id',2)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
        $fdata['fdata'] = null;
        return view('frontend::category')->with($mdata, $fdata);
    }
    public function plan()
    {
        //$data['competitors'] = Category::where('menu_show', '1')->get();
        //$mdata['prices'] = Pricing::all();
        $mdata['SubHead']   = SubscriptionHead::where('deleted_at',Null)->get();
        $mdata['PHead']     = PlanHead::where('deleted_at',Null)->get();
        $mdata['Assign']    = new AssignPlan();
        //dd($mdata);
        $fdata['fdata'] = null;
        return view('frontend::pricing')->with($mdata);
    }
    public function season()
    {
        $mdata['mdata'] = null;
        $fdata['fdata'] = null;
        return view('frontend::season')->with($mdata, $fdata);
    }
    public function series()
    {
        $mdata['mdata'] = null;
        $fdata['fdata'] = null;
        
        return view('frontend::series')->with($mdata, $fdata);
    }
    public function details(Request $request, $slug)
    {
        
        Session::put('redirectUrl', url()->current());

        $mdata['slider']                = null;
        $member                         = auth('member')->user();
        if ($member) {
            $mdata['favorites']['name'] = 'Your Favorites';
            $mdata['favorites']['data'] = MediaFavorite::where(['member_id' => $member->id])->get();
            $mdata['member']['favorites'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['favorites']['name'] = null;
            $mdata['favorites']['data'] = null;
            $mdata['member']['favorites'] = [];
        }

        if ($member) {
            $mdata['listing']['name'] = 'Your Listing';
            $mdata['listing']['data'] = MediaListing::where(['member_id' => $member->id])->get();
            $mdata['member']['listing'] = $mdata['favorites']['data']->pluck('media_id')->toArray();
        } else {
            $mdata['listing']['name'] = null;
            $mdata['listing']['data'] = null;
            $mdata['member']['listing'] = [];
        }

        $mdata['upcoming']['name']      = 'Upcoming Movies';
        $mdata['upcoming']['data']      = Media::orderby('id','DESC')->get();

        $mdata['recomended']['name']    = 'Recommended';
        $mdata['recomended']['data']    = Media::orderby('id','DESC')->get();
        // $mdata['details'] = Media::where('id', 3)->first();

        $mdata['slider'] = null;
        $mdata['mdata'] = Media::where(['slug' => $slug])->first();

        $mdata['similer']['name']    = 'Similer Videos';
        $mdata['similer']['data']    = MediaSimilar::where('media_id',$mdata['mdata']->id)->orderby('id','DESC')->get();
        //dump($mdata);
        //dd($mdata);
        if ($mdata) {
            return view('frontend::page.details')->with($mdata);
        } else {
            return redirect()->back();
        }
    }
    public function start($slug)
    {

        $media  = Media::where(['slug' => $slug])->first();
        if ($media->video_url) {
            $vid    = $media->video_url;
        } else {
            $vid    = 'd8df3cc1d6ba4d64b3ea5efa9f380594';
        }
        $video  = cz_video_api($vid);
        $video  = json_decode($video, true);
        $mdata['otp'] = isset($video['otp']) ? $video['otp'] : null;
        $mdata['playbackInfo'] = isset($video['playbackInfo']) ? $video['playbackInfo'] : null;
        $mdata['mdata'] = $media;
        //dd($mdata);
        try {
            $playLog = new PlayListLog();

            $playLog->video_id           = $media->id;
            $playLog->member_id          = auth('member')->user()->id;
            $playLog->ip                 = $this->getIp();
            $playLog->session_id         = Session::getId();
            // $create->last_watchtime     = '';

            $playLog->save();
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage())
                ->with('myexcep', $ex->getMessage())->withInput();
        }

        return view('frontend::page.start')->with($mdata)->with('success', 'Successfully save changed');
    }
    public function ajax_favorite($id)
    {


        $reslul = ['click' => 'add', 'count' => null];
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        $media = Media::findOrFail($id);
        $user = auth('member')->user();

        $attFind = [
            'media_id' => $id,
            'member_id' => ($user) ? $user->id : null
        ];

        $existing = MediaFavorite::where($attFind)->first();

        if ($existing) {
            MediaFavorite::where($attFind)->delete();
            $reslul['click'] = 'remove';
        } else {
            //dd($attributes);
            $insert = new MediaFavorite;
            $insert->media_id = $id;
            $insert->member_id = ($user) ? $user->id : null;
            $insert->browser_session = null;
            $insert->member_ip = ($ip) ? $ip : null;
            // $insert->modified_by = auth('member')->user()->id;
            $insert->save();
            $reslul['click'] = 'add';
        }
        return response()->json($reslul);
        //dump($user);
        // dd($media);
    }
    public function ajax_listing($id)
    {

        $reslul = ['click' => 'add', 'count' => null];
        $ip     = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        $media  = Media::findOrFail($id);
        $user   = auth('member')->user();

        $attFind = [
            'media_id' => $id,
            'member_id' => ($user) ? $user->id : null
        ];

        $existing = MediaListing::where($attFind)->first();

        if ($existing) {
            MediaListing::where($attFind)->delete();
            $reslul['click'] = 'remove';
        } else {
            //dd($attributes);
            $insert = new MediaListing;
            $insert->media_id = $id;
            $insert->member_id = ($user) ? $user->id : null;
            $insert->browser_session = null;
            $insert->member_ip = ($ip) ? $ip : null;
            // $insert->modified_by = auth('member')->user()->id;
            $insert->save();
            $reslul['click'] = 'add';
        }
        return response()->json($reslul);
        //dump($user);
        // dd($media);
    }
    public function ajax_search(Request $request)
    {
        $data =  Media::search($request->q)->take(6)->get();
        $html = '<ul>';

        foreach ($data as $list) {
            $html .= '<li><a href="' . route('frontend.details', $list->slug) . '">';
            $html .=  $list->title_en;
            $html .=  '</a></li>';
        }
        $html .= '</ul>';
        return response()->json(['data' => $html]);
        //dd($data);
    }
    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
