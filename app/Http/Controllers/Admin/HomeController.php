<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $users=DB::table('users')->where('deleted_at',NULL)->count();
        $payments=DB::table('payments')->count();
        return view('home',compact('users','payments'));
    }
}
