<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * User tweets relationship
     *
     */
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class)->orderBy('created_at', 'desc');
    }

    /**
     *
     * User followers relationship
     *
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    /**
    *
    * User followings relationship
    *
    */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    /**
     *
     * Timeline tweets
     *
     */
    
    public function timeline()
    {
        $timeline = \DB::table('tweets')
            ->select('tweets.id as id', 'tweets.body as body', 'tweets.created_at as tweet_date', 'users.id as user_id', 'users.name as author_name', 'users.username as author_username')
            ->join('users', 'tweets.user_id', '=', 'users.id')
            ->whereRaw("user_id = ".\DB::raw($this->id)." OR user_id in (SELECT users.id user_id FROM users JOIN followers ON users.id = following_id WHERE follower_id =" . \DB::raw($this->id) . ")")
            ->orderBy('tweets.created_at', 'desc')
            ->get();

        return $timeline;
    }


    /**
     *
     * Followed user
     *
     */
    
    public function is_following($id)
    {
        if (null != $this->followings()->find($id)) {
            return true;
        }

        return false;
    }
}
