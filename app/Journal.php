<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Journal extends Model
{
    public $fillable = [];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }
}
