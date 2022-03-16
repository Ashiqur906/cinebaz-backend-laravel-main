<?php

namespace Cinebaz\Banner\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sliders';
    protected $fillable = [
        'title',  'slug',
        'is_active', 'remarks',  'sort_by','create_by', 'modified_by',
    ];

    public function details(){
        return $this->hasMany(SliderDetail::class);
    }
}
