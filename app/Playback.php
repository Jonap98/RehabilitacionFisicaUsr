<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playback extends Model
{
    protected $table = 'playback';

    protected $fillable = ['id', 'id_access', 'id_user', 'id_exercise', 'active'];
}
