<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use App\Models\Flag;
use App\Models\Event;
use App\Models\Comment;
class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
    public function checkJoined(int $user, int $category)
    {
        $checker = DB::table('category_user')->where('user_id',$user)->where('category_id',$category)->value('user_id');
        if ($checker == null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
