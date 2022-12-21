<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use App\Models\Flag;
use App\Models\Event;
use App\Models\Comment;
class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory, Notifiable;
    public function checkDisabled(int $user){
        $checker = DB::table('users')->where('id',$user)->value('disabled');
        if ($checker == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //These columns can have values
    protected $fillable = [
        'adm_no',
        'email',
        'user_image',
        'username',
        'password',
        'password_confirmation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function flags(){
        return $this->hasMany(Flag::class);
    }
    public function events(){
        return $this->belongsToMany(Event::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
