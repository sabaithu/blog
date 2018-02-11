<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
   protected $fillable = [
   	   'user_id',
       'title',
       'cover',
       'slug',
       'pre_description',
       'description',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
