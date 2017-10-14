<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Advertisement extends Model
{
    public $guarded = [''];

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
