<div class="cart-top">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if ($cart)
            @foreach($cart as $cartItem)
            <tr style="background-color: white;">
                <td class="product-item">
                    <div class="p-thumb">
                        <a href="#"><img src="assets/butcher/images/product/01.jpg" alt="product"></a>
                    </div>
                    <div class="p-content">
                        {{-- <a href="#">{{$cartItem['name']}}</a> --}}
                        <a href="#">{{$cartItem->name}}</a>
                    </div>
                </td>
                <td>{{$cartItem->price}}</td>
                <td>
                    <div class="row">
                        <div class="col-2">
                            <button type="button"  wire:click="decrementQty('{{$cartItem->rowId}}')" style="width:100%">-</button>
                        </div>                                        
                        <div class="col-2">
                            <input style="width:100%" type="number" id="qty" name="qty" value="{{$cartItem->qty}}">
                        </div>
                        <div class="col-2">
                            <button type="button"  wire:click="incrementQty('{{$cartItem->rowId}}')" style="width:100%">+</button>
                        </div>
                    </div>
                </td>
                <td>{{$cartItem->subtotal}}</td>
                <td>
                    <a href="#"><img src="assets/butcher/images/del.png" alt="product"></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
