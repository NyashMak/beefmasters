<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Str;

class BMHomeController extends Controller
{
    public function index (){
        $shops = Shop::all();
        if (count($shops)!= 2){
            if (Shop::where('name','Butcher')->first() == ""){       
                $butcher = new Shop;
                $butcher->sid = Str::uuid()->toString();
                $butcher->name = 'Butcher';
                $butcher->save();           
            }
    
            if (Shop::where('name','Farm')->first() == ""){           
                $farm = new Shop;
                $farm->sid = Str::uuid()->toString();
                $farm->name = 'Farm';
                $farm->save();           
            }

            return view('shop_front.home');
        }
        
        return view('shop_front.home');
    }
}
