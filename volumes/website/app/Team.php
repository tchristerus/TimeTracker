<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Team
 *
 * @mixin \Eloquent
 */
class Team extends Model
{
    public function user(){
        $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
