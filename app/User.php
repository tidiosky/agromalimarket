<?php

namespace App;

use App\Models\Categorie;
use App\Models\CommentProduct;
use App\Models\Likeable;
use App\Models\LikeProduct;
use App\Models\Order;
use App\Models\Produit;
use App\Models\Profession;
use App\Models\Pub;
use App\Models\Status;
use App\Models\Unity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed id
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;


    protected $fillable = [
        'name', 'first_name','last_name','country', 'sexe', 'about' ,'section','email', 'password',
    ];
//    public function assignRole(...$roles)
//    {
//        if (request()->user()->section == 'Revendeur') {
//            return $roles->assigne('admin');
//        }
//    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function favorite_products()
    {
        return $this->belongsToMany(Produit::class)->withTimestamps();
    }

    public function product()
    {
        return $this->hasMany(Produit::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentProduct::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function replies()
    {
        return $this->hasMany(Status::class,'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(Likeable::class,'user_id');
    }

    public function likeProduct()
    {
        return $this->hasMany(LikeProduct::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    public function professions()
    {
        return $this->belongsTo(Profession::class);
    }

    public function category()
    {
        return $this->hasMany(Categorie::class);
    }

    public function unity()
    {
        return $this->hasMany(Unity::class);
    }
    public function pub()
    {
        return $this->hasMany(Pub::class);
    }

    public function getName()
    {
        if ($this->first_name and $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }
        if ($this->first_name){
            return $this->first_name;
        }
        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ? : $this->name;
    }

    public function getFirstnameOrUsername()
    {
        return $this->first_name ? : $this->name;
    }

    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email.$this->name) }} ? d=mm&s=60";
        //return "<img src='../public/dist/img/gravatar.png'>";
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User','friends','user_id','friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('App\User','friends','friend_id','user_id');
    }


    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted',true)->get()
            ->merge($this->friendOf()->wherePivot('accepted',true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted',false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted',false)->get();
    }

    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id',$user->id)->count();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);

    }
    public function deleteFriend(User $user)
    {
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
            'accepted' => true
        ]);
    }

    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    public function hasLikedStatus(Status $status)
    {
        return (bool) $status->likes()->where('user_id', $this->id)->count();
    }
    public function setPasswordAttribute($value) {
        if ($value) {
            $this->attributes['password'] = app('hash')->needsRehash($value)?Hash::make($value):$value;
        }
    }

}
