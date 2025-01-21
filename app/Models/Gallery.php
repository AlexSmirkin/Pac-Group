<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;

    protected $table = 'ships_gallery';
    protected $fillable = ['ship_id', 'title', 'ordering'];
}
