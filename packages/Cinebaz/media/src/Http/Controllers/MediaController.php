<?php

namespace Cinebaz\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Cinebaz\Media\DataTables\MediaDT;
use Cinebaz\Media\Http\Requests\MediaFV;
use Cinebaz\Media\Http\Requests\MediaAddFV;
use Cinebaz\Media\Models\Media;
use Cinebaz\Media\Models\MediaSimilar;
use Cinebaz\Media\Models\Picture;
use Cinebaz\Media\Models\PlayListLog;
use Cinebaz\Series\Models\Series;
use Cinebaz\Season\Models\Season;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Cinebaz\Seo\Models\Seo;
use Cinebaz\Seo\Traits\TSeo;
use Cinebaz\Media\Traits\TPicture;
use Carbon;

class MediaController extends Controller
{
    use TSeo;
    use TPicture;
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function details(Request $request)
    {
        $media = Media::findOrFail($request->id);
        $data['mdata'] = $media;
        $data['fdata'] = null;


        //   return (getWeek());
        foreach (getWeek() as $valu) {

            $date = date('Y-m-d', strtotime('this ' . $valu));
            $data['thisweek'][$valu]['date'] =  $date;
            $data['thisweek'][$valu]['total'] = PlayListLog::where('video_id', $request->id)->whereDate('created_at', $date)->count();
            $data['thisweek'][$valu]['unique'] =  PlayListLog::where('video_id', $request->id)->whereDate('created_at', $date)->distinct()->count('member_id');
        }

        // dd(  $data['thisweek']);

        return view('media::details')
            ->with($data);
    }
    public function index(MediaDT $dataTable)
    {
        $mdata = null;
        $fdata = null;
        //dd($dataTable->request()->all());

        return $dataTable->render('media::index', compact('fdata', 'mdata'));
    }
    public function add()
    {

        $fdata = null;
        $mdata = null;
        $getSeries = Series::get();
        return view('media::add')
            ->with([
                'fdata' => $fdata,
                'mdata' => $mdata,
                'getSeries' => $getSeries
            ]);
    }
    public function title(MediaAddFV $request)
    {
        $attributes = [
            'slug'              => $request->get('slug'),
            'title_en'          => $request->get('title'),
            'modified_by'       => auth('web')->user()->id
        ];

        $insert = Media::create($attributes);
        $insert->save();

        return redirect()->route('admin.media.edit', $insert->id);
    }

    public function getSession($id)
    {
        return $getSession = Season::where('series_id', $id)->get();
    }

    public function edit(Request $request, $id)
    {
        $fdata      = Media::findOrFail($id);
        //    dd( $fdata);
        $getSeries  = Series::get();
        $mdata      = null;
        return view('media::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata, 'getSeries' => $getSeries]);
    }
    public function delete(Request $request, $id)
    {
        $fdata      = Media::findOrFail($id);
        $deltfdata  = $fdata->delete();
        return redirect()->back();
    }

    public function store(MediaFV $request)
    {
        // dd($request);
        $id = $request->get('id');
        $attributes = [
            'slug'              => $request->get('slug'),
            'regular_price'     => $request->get('regular_price'),
            'discount_price'    => $request->get('discount_price'),
            'age_limit'         => $request->get('age_limit'),
            'duration'          => $request->get('duration'),
            'release_year'      => $request->get('release_year'),
            'video_type'        => $request->get('video_type'),
            'youtube_url'       => $request->get('youtube_url'),
            'video_url'         => $request->get('video_url'),
            'trailer_url'       => $request->get('trailer_url'),
            'video_nature_id'   => $request->get('video_nature'),
            'series_id'         => $request->get('series_id'),
            'session_id'        => $request->get('session_id'),
            'thumbnil_portrait'  => (!empty($request->thumbnil_portrait)) ? $request->thumbnil_portrait[0] : null,
            'thumbnil_landscape' => (!empty($request->thumbnil_landscape)) ? $request->thumbnil_landscape[0] : null,
            'premium'           => $request->get('premium'),
            'published_at'      => ($request->published_at) ? date('Y-m-d H:i:s', strtotime($request->published_at)) : null,
            'starring'          => $request->get('starring'),
            'remarks'           => $request->get('remarks'),
            'sort_by'           => $request->get('sort_by'),
            'is_active'         => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by'       => auth('web')->user()->id,
        ];
        // dd($attributes);


        foreach (config('cz_media.lang') as $key => $val) {
            // dd($key);
            $attributes['title_' . $key]                =  $request->get('title_' . $key);
            $attributes['short_description_' . $key]    =  $request->get('short_description_' . $key);
            $attributes['description_' . $key]          =  $request->get('description_' . $key);
        }

        $pictues = array_merge(
            ($request->thumbnil_landscape) ? $request->thumbnil_landscape : [],
            ($request->thumbnil_portrait) ? $request->thumbnil_portrait : [],
            ($request->post_file) ? $request->post_file : [],
            ($request->logo) ? $request->logo : [],
            ($request->certificate) ? $request->certificate : [],
        );


        if (!$id) {
            $attributes['create_by']  = auth('web')->user()->id;
        }
        try {

            if ($id) {
                $existing       = Media::findOrFail($id);
                $sumbit         = Media::where('id', $id)->update($attributes);
                $existing->categories()->sync($request->category);
                $existing->artists()->sync($request->artists);
                $dltexisting    = MediaSimilar::where('media_id', $id)->delete();
                // dd($attributes);
                if (!empty($request->media_id)) {

                    foreach ($request->media_id as $key) {
                        MediaSimilar::insert([
                            'media_id'  => $id,
                            'similar_id' => $key,
                        ]);
                    }
                }
                if (!empty($pictues)) {
                    foreach ($pictues as $list) {
                        Picture::where(['id'  => $list])->update(['imageable_id' => $id]);
                    }
                }

                $existing->tags()->sync($request->tag);
                $existing->genres()->sync($request->genre);
                $existing->save();

                $abledata = [
                    'data' => $request,
                    'able_id' => $id,
                    'able_type' => Media::class,
                ];

                $this->seoPost($abledata);

                //$this->imgPost($abledata);
                // dd($attributes);
            } else {
                $insert = Media::create($attributes);
                $insert->categories()->sync($request->category);
                $insert->artists()->sync($request->artists);
                if (!empty($request->media_id)) {
                    foreach ($request->media_id as $key) {
                        MediaSimilar::insert([
                            'media_id'  => $insert->id,
                            'similar_id' => $key,
                        ]);
                    }
                }
                $insert->tags()->sync($request->tag);
                $insert->genres()->sync($request->genre);
                $insert->save();
                $abledata = [
                    'data' => $request,
                    'able_id' => $insert->id,
                    'able_type' => Media::class,
                ];
                if (!empty($pictues)) {
                    foreach ($pictues as $list) {
                        Picture::where(['id'  => $list])->update(['imageable_id' =>  $insert->id]);
                    }
                }
                $this->seoPost($abledata);
                // $this->imgPost($abledata);
            }

            return redirect()->route('admin.media.index')->with('success', 'Successfully save changed');
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
    public function Seogenarate($request)
    {

        $attributes = [
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
        $id = $request->get('id');
        $seo_id = $request->get('seo_id');
        if (!$id) {
            $attributes['create_by']  = auth('web')->user()->id;
        }

        //dump($id);
        if ($seo_id) {
            $existing = Seo::findOrFail($seo_id);
            $data =  Seo::where('id', $existing->id)->update($attributes);
            return $seo_id;
        } else {
            $data =  Seo::create($attributes);
            return $data->id;
        }

        return null;
    }
}
