<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //usermodelにview側に渡す値を$fillableに詰めて、./vendor/bin/sail artisan make:controller UserControllerで作成
    public function create(){
        return view('register1');//フォームを表示
    }
    public function store(Request $request){
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return to_route('home');

        
    }
}
