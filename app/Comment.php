<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

// Comment class instance will refer to comment table in database
class Comment extends Model
{
  //comments table in database
  protected $fillable = ['name','on_post','body'];
  // user who has commented

  // public function author()
  // {
  //   return $this->belongsTo('App\User', 'from_user');
  // }
  
  // returns post of any comment
  // public function post()
  // {
  //   return $this->belongsTo('App\Post', 'on_post');
  // }
}