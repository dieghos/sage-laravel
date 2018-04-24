<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
      'code','description','comments','etx','time_limit','exit_date','state'
    ];

    /**
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function assignDocument(Document $document){
      return $this->documents()->save($document);
    }
    public function users(){
      return $this->belongsToMany(User::class);
    }
}
