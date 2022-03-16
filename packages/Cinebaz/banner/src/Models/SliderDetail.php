<?php

namespace Cinebaz\Banner\Models;

use Cinebaz\Media\Models\Picture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'slider_details';
    protected $fillable = [
        'slider_id',  'media_id','title','description','button','button_link',
        'is_active', 'remarks',  'sort_by','create_by', 'modified_by',
    ];


      function slider()
      {
        return $this->belongsTo(Slider::class);
      }
      function Bannermedia()
      {
        return $this->hasOne('Cinebaz\Media\Models\Media', 'id', 'media_id');
      }
      public function getImage()
      {
          return $this->morphOne(Picture::class, 'imageable')->latest();
      }
}
