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
use App\Models\Comment;
class Event extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
    public function checkJoined(int $user, int $event)
    {
        $checker = DB::table('event_user')->where('user_id',$user)->where('event_id',$event)->value('user_id');
        if ($checker == null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
