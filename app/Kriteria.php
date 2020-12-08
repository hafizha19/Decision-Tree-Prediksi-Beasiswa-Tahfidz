<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
