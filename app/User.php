<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName(){
		return $this->name; 
	}

    public function getAvatarUrl(){
		$hash = md5($this->email);
		return "https://www.gravatar.com/avatar/{$hash}?s=40";
    }
    
    public function statuses(){
		return $this->hasMany('App\Status');
    }
    
    public function friendsOfMine(){
		return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }
    
    public function friendOf(){
		return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }
    
    public function friends(){
		return $this->friendsOfMine()->wherePivot('accepted', true)->get()
			->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }
    
    public function friendRequests(){
		return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    
    public function friendRequestsPending(){
		return $this->friendOf()->wherePivot('accepted', false)->get();
    }
    
    public function hasFriendRequestPending(User $user){
		return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }
    
    public function hasFriendRequestReceived(User $user){
		return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }
    
    public function addFriend(User $user){
		$this->friendOf()->attach($user->id);
    }

    public function deleteFriend(User $user){
		$this->friendOf()->detach($user->id);
		$this->friendsOfMine()->detach($user->id);
	}
    
    public function acceptFriendRequest(User $user){
		$this->friendRequests()->where('id', $user->id)->first()->pivot->update(['accepted' => true]);
    }
    
    public function isFriendsWith(User $user){
		return (bool) $this->friends()->where('id', $user->id)->count();
  }
  
    public function hasLikedStatus(Status $status){
      return (bool) $status->likes->where('user_id', $this->id)->count();
    }
}
