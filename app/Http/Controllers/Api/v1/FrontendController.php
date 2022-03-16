<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BannerResource;
use App\Http\Resources\v1\CategoryMediaResource;
use App\Http\Resources\v1\CategoryResource;
use App\Http\Resources\v1\FavoriteResource;
use App\Http\Resources\v1\GenreResource;
use App\Http\Resources\v1\MediaResource;
use App\Http\Resources\v1\SeriesResource;
use App\Http\Resources\v1\SubscriptionResource;
use Cinebaz\Banner\Models\Banner;
use Cinebaz\Category\Models\Category;
use Cinebaz\Genre\Models\Genre;
use Cinebaz\Media\Models\Media;
use Cinebaz\Media\Models\MediaFavorite;
use Cinebaz\Pricing\Models\PlanHead;
use Cinebaz\Pricing\Models\SubscriptionHead;
use Cinebaz\Series\Models\Series;

class FrontendController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['home_web', 'test','get_category']]);
    }

    public function home_web(Request $request)
    {

        $genre      = $request->genre;
        $lang       = $request->lang;
        $member     = auth('member')->user();

        $section['home']['slider'] = Banner::where(['name_id' => 1])->get();

 
        $upcoming   = Media::where('published_status', 1)
            ->inRandomOrder()
            ->take(10)
            ->get();
        $free   = Media::where('published_status', 0)
            ->inRandomOrder()
            ->take(10)
            ->get();
        $premium    = Media::where('premium', 1)
            ->inRandomOrder()
            ->take(10)
            ->get();


        if ($member) {
            $favorites = MediaFavorite::where(['member_id' => $member->id])
                ->inRandomOrder()
                ->take(10)
                ->get();
        } else {
            $favorites = null;
        }


        $section['home']['section'][] = [
            'name' => 'Upcomming',
            'link' => '#',
            'medias' => MediaResource::collection($upcoming)
        ];
        $section['home']['section'][] = [
            'name'      => 'Free',
            'link'      => '#',
            'medias'    => MediaResource::collection($free)
        ];
        $section['home']['section'][] = [
            'name' => 'Premium',
            'link' => '#',
            'medias' => MediaResource::collection($premium)
        ];
        if ($member) {
            $section['home']['section'][] = [
                'name' => 'Favourite',
                'link' => '#',
                'medias' => FavoriteResource::collection($favorites)
            ];
        }
        
        return $section;

        // $upcoming = Media::where('published_status', 1)->inRandomOrder()->take(10)->get();
        // $free = Media::where('premium', '0')->inRandomOrder()->take(10)->get();
        // $premium = Media::where('premium', 1)->inRandomOrder()->take(10)->get();



        // return [
        //     'slider' =>  BannerResource::collection($slider),
        //     'upcoming' =>  MediaResource::collection($upcoming),
        //     'free' =>  MediaResource::collection($free),
        //     'premium' =>  MediaResource::collection($premium),
        // ];
    }
    public function test()
    {
        $data = asset('/assets/demo.json');
        return json_decode(file_get_contents($data), true);


        // return $data;
    }
    public function get_category()
    {
        $data = Category::get();
        return CategoryResource::collection($data); 
        // for collection
        // return new CategoryResource($categories); for Singel
    }
    public function get_series()
    {
        $data = Series::all();
        return SeriesResource::collection($data); // for collection

    }
    public function get_movies()
    {
        $data = Media::all();
        return MediaResource::collection($data); // for collection

    }
    public function get_movie_id(Request $request)
    {   
        $data = Media::all();
        return MediaResource::collection($data); // for collection

    }
    public function get_movies_ids()
    {
        $data = Media::all();
        return MediaResource::collection($data); // for collection

    }


    public function get_movies_by_cat(Request $request)
    {
        $category = $request->category;
        $lang = $request->lang;
        $data = Category::find($category);
        return new CategoryMediaResource($data);
    }
    public function get_movies_by_genre(Request $request)
    {
        $genre = $request->genre;
        $lang = $request->lang;

        $genre = Genre::find($genre);
        if ($genre) {
            $data = new GenreResource($genre);
            $data = $data->additional(['medias' =>  MediaResource::collection($genre->medias)]);
            return $data;
        }
        return [];
    }
    public function add_favorite(Request $request)
    {
        $success = false;
        $id = $request->mediaId;
        $media = Media::find($id);
        if ($media) {
            $ip = null;
            $user = auth()->user();
            $attFind = [
                'media_id' => $id,
                'member_id' => ($user) ? $user->id : null
            ];

            $existing = MediaFavorite::where($attFind)->first();
            if (!$existing) {
                $insert = new MediaFavorite;
                $insert->media_id = $id;
                $insert->member_id = ($user) ? $user->id : null;
                $insert->browser_session = null;
                $insert->member_ip = ($ip) ? $ip : null;
                $insert->modified_by = $user->id;
                $insert->save();
                $success = true;
            }
        }
        return response()->json(['success' => $success]);
    }
    public function remove_favorite(Request $request)
    {
        $success = false;
        $id = $request->mediaId;
        $media = Media::find($id);
        if ($media) {
            $ip = null;
            $user = auth()->user();
            $attFind = [
                'media_id' => $id,
                'member_id' => ($user) ? $user->id : null
            ];

            $existing = MediaFavorite::where($attFind)->first();

            if ($existing) {
                MediaFavorite::where($attFind)->delete();

                $success = true;
            }
        }
        return response()->json(['success' => $success]);
    }
    public function get_favorite(Request $request)
    {
        $lang = $request->lang;
        $member = auth()->user();
        $favorite = MediaFavorite::where(['member_id' => $member->id])->get();
        return FavoriteResource::collection($favorite);
    }
    public function get_listings(Request $request)
    {
        $lang       = $request->lang;
        $limit      = ($request->limit)? $request->limit : 10;
        $member     = auth()->user();
        $favorite   = MediaListing::where('member_id',$member->id)
            ->paginate($limit);
        return FavoriteResource::collection($favorite);
    }
    public function get_all_Free(Request $request)
    {
        $lang = $request->lang;
        $free = Media::where(['premium' => 0])->get();
        return MediaResource::collection($free);
    }
    public function get_all_Series(Request $request)
    {
        $lang = $request->lang;
        $series = Series::all();
        return SeriesResource::collection($series);
    }
    public function subscriptions(Request $request)
    {
        $lang = $request->lang;
        $plan = SubscriptionHead::get();
        return SubscriptionResource::collection($plan);
    }
}
