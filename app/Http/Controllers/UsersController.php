<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Like;
use App\Rules\IsAllowedDomain;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.disabled',['except'=>['index','show']]);
        $this->middleware('auth');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($user->events);
        $err_message = 'The has been banned!';
        $err_message1 = 'The user does not exist!';
        if($user != null){
            if($user->deleted_at == null){
                return view('users.show')->with('user',$user)->with('posts',$user->posts);
            }else{
                return view('index')->with('danger',$err_message);
            }
        }else{
            return view('index')->with('danger',$err_message1);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        if(auth()->user()->id !== $users->id){
            return redirect('/users/'.auth()->user()->id)->with('danger','You Do Not Have Permission To Edit This Page');
        }else{
            return view('users.edit')->with('users',$users);
        }
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
        $userId = isset($user) ? $user->id : null;
        $this->validate($request,[
            'username'=>'nullable|sometimes|unique:users',
            'name'=>'nullable|sometimes',
            'adm_no'=>'nullable|sometimes|unique:users',
            'email'=> 'nullable', new IsAllowedDomain,
            'user_image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('user_image')){
            $fileNameWithExt = $request->file('user_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $ext_type = $request->file('user_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$ext_type;
            $path = $request->file('user_image')->storeAs('public/cover_images/',$fileNameToStore);
        }
        $user=User::find($id);
        $user -> name = $request->input('name');
        $user -> username = $request->input('username');
        $user -> email = $request->input('email');
        $user -> adm_no = $request->input('adm_no');
        if($request->hasFile('user_image')){
            \Storage::delete('public/user_images/'.$user->user_image);
            $user->user_image = $fileNameToStore;
        }
        $user->save();
        return redirect('/users/'.$user->id)->with('success','User Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
