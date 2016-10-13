<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public $incrementing = true;


    public function path(){
        return '/records/' .$this->id;
    }
}
