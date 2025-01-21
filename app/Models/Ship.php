<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ship extends Model
{
    public $timestamps = false;

    protected $table = 'ships';
    protected $fillable = ['title', 'spec', 'description', 'ordering', 'state'];

    public function getSpecHtml(): string
    {
        $res = [];
        $specArray = json_decode($this->spec);
        foreach ($specArray as $spec) {
            $res[] = ($spec->name ?? '') . ': ' . ($spec->value ?? '') . '<br>';
        }

        return implode('', $res);
    }

    /**
     * @return HasMany
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, 'ship_id', 'id')
            ->orderBy('ordering');
    }

    /**
     * @return HasMany
     */
    public function cabin(): HasMany
    {
        return $this->hasMany(Cabin::class, 'ship_id', 'id')
            ->orderBy('ordering');
    }
}
