<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @mixin \Eloquent
 */
class Project extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
