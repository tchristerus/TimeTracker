<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectOwner extends Model
{
    protected $table = "projects_ownership";

    public function projects () {
        return $this->hasMany('app\Project');
    }
}
