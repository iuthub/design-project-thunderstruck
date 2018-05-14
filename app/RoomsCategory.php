<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsCategory extends Model
{
    protected $table = 'rooms_category';
    protected $guarded = [];

    public function images()
		{
		    return $this->hasMany('App\Gallery', 'room_id');
		}
}
