<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
      'type','path',
    ];

    public function files(){
      return $this->belongsToMany(File::class);
    }
}
