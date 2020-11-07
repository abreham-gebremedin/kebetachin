<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use \Conner\Tagging\Taggable;
    protected $fillable = [ 'title', 'body','tags' ];
}
