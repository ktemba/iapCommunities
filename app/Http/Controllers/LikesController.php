<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
class LikesController extends Controller
{
    public function __construct(){
        $this->middleware('check.disabled',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        if ($posts->likedBy($request->input('user_id'),$request->input('posts_id'))==TRUE) {
            $this->validate($request,[
            'user_id'=>'required',
            'posts_id'=>'required'
         ]);
            $like = new Like();
            $like->user_id = auth()->user()->id;
            $like->post_id=$request->input('posts_id');
            $like->save();
            return back()->with('success','Post has been liked');
        }else{
        return back()->with('danger','Post has already been liked');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = new Post();
        if ($posts->likedBy(auth()->user()->id,$id)==FALSE) {
            $like = DB::table('likes')->where('user_id',auth()->user()->id)->where('post_id',$id);
            $like->delete();
            return back()->with('success','You Have unliked this post');
        }else{
        return back()->with('danger','You have not liked this post');
        }
    }
}
