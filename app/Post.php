<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\Category');
    }

    protected $dates =['deleted_at'];

    protected $fillable =[
        'title','content','category_id','featured','slug','user_id','image_name'
    ];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}