<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    
    public function users() {
        $users = DB::table('users')->get();
        return view('admin/adminview')->with(['users'=>$users]);
    }
    /*public function details($id) {
        $user = DB::table('users')
        ->where('id', $id)->first();
        return view('users/details')->with(['user'=>$user]);
    }*/

}
