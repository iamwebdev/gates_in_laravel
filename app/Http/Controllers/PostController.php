<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\User;
use App\Post;

class PostController extends Controller
{
    public function view(Post $post)
  	{
	    $user = Auth::user();
	    if ($user->can('viewPosts', $post)) {
	      echo "Current logged in user can view Posts";
	    } else {
	      echo 'Not Authorized.';
	    }
  	}
 
  	public function create()
  	{
	    $user = Auth::user();
	    if ($user->can('addPost', Post::class)) {
	      echo 'Current logged in user is allowed to create new posts.';
	    } else {
	      echo 'Not Authorized';
	    }
  	}
 
  	public function update()
  	{
  	  // get current logged in user
	    $user = Auth::user();
	 
	    // load post
	    $post = Post::find(1);
	 
	    if ($user->can('update', $post)) {
	      echo "Current logged in user is allowed to update the Post: {$post->id}";
	    } else {
	      echo 'Not Authorized.';
	    }
  	}
 
  	public function delete()
  	{	
	    // get current logged in user
	    $user = Auth::user();
	     
	    // load post
	    $post = Post::find(1);
	     
	    if ($user->can('delete', $post)) {
	      echo "Current logged in user is allowed to delete the Post: {$post->id}";
	    } else {
	      echo 'Not Authorized.';
	    }
	}

}
