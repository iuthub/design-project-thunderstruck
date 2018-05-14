<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $guarded = [];

    public function room()
    {
    	return $this->hasOne("App\Rooms", "room_id");
    }
}
