<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Position extends Model
{
    public $guarded = [];

    public function journals()
    {
        return $this->belongsTo(Journal::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
