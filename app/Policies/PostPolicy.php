<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function viewPosts(User $user, Post $post)
    {
        if ($user->isAdmin==1){
          return true;
        }
        return false;
    }
 
  /**
   * Determine whether the user can create posts.
   *
   * @param  \App\User  $user
   * @return mixed
   */
    public function addPost(User $user)
    {
        if($user->isAdmin == 1){
          return true;
        }
        return false;
    }
 
  /**
   * Determine whether the user can update the post.
   *
   * @param  \App\User  $user
   * @param  \App\Post  $post
   * @return mixed
   */
    public function update(User $user, Post $post)
    {
        if ($user->isAdmin == 1){
            return true;
        }
        return false;
    }
 
  /**
   * Determine whether the user can delete the post.
   *
   * @param  \App\User  $user
   * @param  \App\Post  $post
   * @return mixed
   */
    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
