<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
