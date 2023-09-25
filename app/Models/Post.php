<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];


    protected $casts=[

        'hide_like_view'=>'boolean',
        'allow_commenting'=>'boolean',

    ];

    function media () : MorphMany {
        return $this->morphMany(Media::class,'mediable');
    }


    function user() : BelongsTo {

        return $this->belongsTo(User::class);
        
    }




}

