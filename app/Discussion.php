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
    
    
    //User who posted the discussion
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

   public function scopeIdDescending($query){
        return $query->orderBy('created_at','DESC');
   }   
    
    public function commentCount(){
        $count = Comment::where('discussion_id', '=', $this->id)->count();
    return $count;
    }
    
public function getRatio(){
    $count = Comment::where('discussion_id', '=', $this->id)->count();
    $sum_score = Comment::where('discussion_id', '=', $this->id)->sum('score');
    $sum_ratings = Comment::where('discussion_id', '=', $this->id)->sum('no_ratings');
    if ($count == 0 || $sum_ratings < 5){
        $ratio = 1;
    }else {
        $ratio = ($sum_score)/(4 * $count);
    }
    return $ratio;
    }
}