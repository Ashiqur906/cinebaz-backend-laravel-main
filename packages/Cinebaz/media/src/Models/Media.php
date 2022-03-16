<?php

namespace Cinebaz\Media\Models;

use Cinebaz\Category\Models\Category;
use Cinebaz\Genre\Models\Genre;
use Cinebaz\Seo\Models\Seo;
use Cinebaz\Tag\Models\Tag;
use Cinebaz\Series\Models\Series;
use Cinebaz\Season\Models\Season;
use Cinebaz\Media\Models\MediaSimilar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Cinebaz\Artist\Models\Artist;

class Media extends Model
{
    use Searchable;
    use HasFactory;
    use SoftDeletes;
    protected $table = 'media';
    protected $fillable = [
        'title_en',  'title_bn', 'title_hn', 'slug', 'regular_price', 'discount_price', 'description_en', 'description_bn', 'description_hn',
        'short_description_en', 'short_description_bn', 'short_description_hn', 'age_limit', 'duration', 'release_year',
        'video_type', 'premium', 'published_status', 'starring', 'trailer_url', 'video_url', 'youtube_url', 'thumbnil_portrait', 'thumbnil_landscape',
        'remarks', 'sort_by', 'is_active', 'published_at', 'create_by', 'modified_by', 'video_nature_id', 'series_id', 'session_id'
    ];
    // php artisan scout:import "Cinebaz\Media\Models\Media"
    // public function searchableAs()
    // {
    //     return 'media_index';
    // }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'media_category');
    }

    public function   artists()
    {
        return $this->belongsToMany(Artist::class, 'media_artists');
    }
    public function similars()
    {
        return $this->hasMany(MediaSimilar::class);
    }

    public function suggested()
    {
        return $this->belongsToMany(Media::class, 'media_similars');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'media_tag');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'media_genre');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
    public function featured()
    {
        return $this->morphOne(Picture::class, 'imageable')->where('image_type', 1)->latest();
    }
    public function featuredL()
    {
        return $this->morphOne(Picture::class, 'imageable')->where('image_type', 2)->latest();
    }
    public function logo()
    {
        return $this->morphOne(Picture::class, 'imageable')->where('image_type', 3)->latest();
    }
    public function certificate()
    {
        return $this->morphOne(Picture::class, 'imageable')->where('image_type', 4)->latest();
    }

    public function images()
    {
        return $this->morphMany(Picture::class, 'imageable')->where('image_type', 0)->latest();
    }
    public function allimages()
    {
        return $this->morphMany(Picture::class, 'imageable')->latest();
    }
    static function getSeries($id)
    {
        return  Series::where('id', $id)->first();
    }
    static function getSession($id)
    {
        return  Season::where('id', $id)->first();
    }
    public function getViewCount()
    {
        // return  PlayListLog::where('video_id', $id)->get()->count();


        return $this->hasMany(PlayListLog::class, 'video_id', 'id');
    }
}
