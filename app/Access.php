<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'access';

    protected $fillable = ['id', 'id_user', 'active'];
}
