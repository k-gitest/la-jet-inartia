<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//GateはAuth\Access\GateではなくSupport\Facades\Gateを指定
use Illuminate\Support\Facades\Gate;

class TestinputController extends Controller
{
    //
    public function show()
    {
        //照会画面を表示
       return Inertia::render('Menu/Show');
    }
    
    public function edit(){
        if(Gate::denies('user')){
            //更新画面を表示
            return Inertia::render('Menu/Edit');
        } else {
            session()->flash('editmsg' ,'権限がないので更新できません');
            return Inertia::render('Menu');
        }
    }
}
