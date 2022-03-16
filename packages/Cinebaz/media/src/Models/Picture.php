<?php

namespace Cinebaz\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use HasFactory;
   
    protected $table = 'pictures';

    protected $fillable = [
        'imageable_id',  'imageable_type', 'name', 'file_name', 'image_type', 'mime_type', 'small',
        'medium', 'full', 'thumbnail',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
    public function imageable()
    {
        return $this->morphTo();
    }
}
