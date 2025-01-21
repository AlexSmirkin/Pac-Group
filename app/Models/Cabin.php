<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    public $timestamps = false;

    protected $table = 'cabin_categories';
    protected $fillable = ['ship_id', 'vendor_code', 'title', 'type', 'description'];

    public function getOnePhotoUrl(): string
    {
        $matches = [];
        preg_match('["(.*)"]', $this->photos, $matches);

        return $matches[1] ?? '';
    }
}
