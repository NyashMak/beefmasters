<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Http\Request;
class ProductsTable extends Component
{

    public function incrementQty(string $rowId){
        $cartItem = Cart::get($rowId);
        $qty = $cartItem->qty;
        $qty = $qty + 1;
        Cart::update($rowId, $qty);
        // dd();
    }

    public function decrementQty(string $rowId){
        $cartItem = Cart::get($rowId);
        $qty = $cartItem->qty;
        $qty = $qty - 1;
        Cart::update($rowId, $qty);
    }
    public function render()
    {
        $cart = Cart::content();
        $cartArray = $cart->toArray();
        // dd($cartArray);
        return view('livewire.products-table', compact('cart', 'cartArray'));
    }
}
