<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect, Response, File;

class UserController extends Controller
{
    function register(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $password = Hash::make($req->input('password'));
        DB::table('users')->insert([
            'name' =>   $name,
            'email' =>  $email,
            'password' => $password
        ]);
    }
    function login(Request $req)
    {
        $email =  $req->input('email');
        $password = $req->input('password');

        $user = DB::table('users')->where('email', $email)->first();
        if (!Hash::check($password, $user->password)) {
            echo "Not Matched";
        } else {
            //$user = DB::table('users')->where('email',$email)->first();
            echo $user->email;
        }
    }
}
