<?php

namespace Cinebaz\Artist\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];
}
