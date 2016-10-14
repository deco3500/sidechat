<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public $incrementing = true;

    protected $fillable = ['title', 'url', 'ratio'];

    public function hostDomain(){
        return parse_url($this->url, PHP_URL_HOST);
    }
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

   
}
