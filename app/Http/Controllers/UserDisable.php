<?php

namespace App\Http\Controllers;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

use Illuminate\Http\Request;
use App\Models\User;
class UserDisable extends Controller
{
    public function disable(){
        $user = User::where('id',\request("id"))->first();
        $user->disabled = 1;
        $user->save();
        return redirect(route('voyager.users.index'));
    }
}
