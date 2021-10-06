<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = 'tags';

    // relation to table post
    public function posts()
    {
        return $this->belongsToMany('App\posts');
    }
}
