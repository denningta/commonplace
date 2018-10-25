<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function userEdit() {
        $user = User::UserDetails()->first();
        return view('users.userEdit', compact('user'));
    }

    public function userUpdate(Request $request) {
        User::validateUser();
        
        $updated_at = Carbon::now();

        $user = User::where('id', Auth::id());
        $user->update($request->except(['_token', '_method']));

        return redirect('/account');
    }
}
