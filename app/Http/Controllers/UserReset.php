<?php

namespace App\Http\Controllers;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserReset extends Controller
{
    public function reset(){
        $user = User::where('id',\request("id"))->first();
        $user->password = Hash::make('password');
        $user->save();
        return redirect(route('voyager.users.index'))->with('success','Password has been Reset.');
    }
}
