<?php

namespace Carsdy\Http\Controllers\AppLogic;

use Carsdy\Http\Controllers\Controller;
use Carsdy\Card;
use Carsdy\CardSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class PRofileController extends Controller
{

    public function showCardSets(Request $request, $requested_id){
        
        $user_id = Auth::user()->id;

        if($requested_id == $user_id){
            $data = DB::table('card_sets')->where('user_id', $user_id)->get();

            return view('user_card_sets')->with([
                'card_sets' => $data,
                'username' => Auth::User()->username
            ]);
        }else{
            $data = DB::table('card_sets')->where('user_id', $requested_id)->where('access','public')->get();
            $username = DB::table('users')->where('id', $requested_id)->value('username');

            return view('user_card_sets')->with([
                'card_sets' => $data,
                'username' => $username
            ]);
        }
    }


}