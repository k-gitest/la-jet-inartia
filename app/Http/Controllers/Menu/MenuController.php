<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
//Authを使うので追加
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menu(){
        
        /*
        if(Auth::check()){
            //ログイン済み処理
            return view('menu/menu');            
        }else{
            //未ログインの処理
            return view('/');
        }
        */
    }
    
    public function secret(){
        return view('secret/secret');
    }
    
}
