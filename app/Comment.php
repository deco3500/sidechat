<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $incrementing = true;

    protected $fillable = ['text', 'parent_id', 'score', 'no_ratings', 'user_id', 'level', 'discussion_id'];

    public function hostDomain(){
        return parse_url($this->url, PHP_URL_HOST);
    }
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function poster(){
        $owner = User::where('id', '=', $this->user_id)->first();
        
        return $owner->name;
    }
    
    public function timeSincePost(){
        $post_time = $this->created_at;
        $secsDiff = ( time() - strtotime($post_time) );
        //Less than 1 minute
        if ($secsDiff < 60){
            $time = round($secsDiff, 0);
            $responseTime = $time . " seconds";
        //Less than 1 hour
        } else if ($secsDiff/60 < 60){
            $time = round($secsDiff/60, 0);
            $responseTime = $time . " minutes";
        //Less than 1 Day
        } else if ($secsDiff/3600 < 24){
            $time = round($secsDiff/3600, 0);
            $responseTime = $time . " hours";
        } else {
            $time = round($secsDiff/86400, 0);
            $responseTime = $time . " days";
        }
        
        return $responseTime;
    }
}