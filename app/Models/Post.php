<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use App\Models\Flag;
use App\Models\Event;
use App\Models\Comment;
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable =['category_id'];
    use HasFactory;
    public function likedBy(int $user, int $post)
    {
        $checker = DB::table('likes')->where('user_id',$user)->where('post_id',$post)->value('user_id');
        if ($checker == null) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    public function user(){
       return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
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
        return $this->hasMany(Event::class);
    }
}
