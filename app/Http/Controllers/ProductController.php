<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Discount;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.index', compact('products', 'categories', 'discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.create', compact( 'categories', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);
        // dd('Validation OK');

        // Create a new product without the inventory ID first
        request()->request->add(['sid'=>Str::uuid()->toString()]);
        $input = $request->all();
        Product::create($input);

        // Create Inventory record and get the record's ID
        $sid = $request->sid;
        $name = $request->name;
        $quantity = $request->quantity;
        $weight = $request->weight;
        request()->request->add(['sid'=>Str::uuid()->toString()]);
        request()->request->add(['quantity'=>$quantity]);
        request()->request->add(['weight'=>$weight]);
        $data = $request->all('quantity','sid','weight');
        // dd($data);
        Inventory::create($data);
        $inventory = Inventory::where('sid', $data['sid'])->first();
        // dd($inventory);
        $inventory_id = $inventory->id;

        // Update Product with newly created inventory ID
        $product = Product::where('sid', $sid)->first();
        $product->inventory_id = $inventory_id;
        $product->save();
        // dd($product->inventory_id);

        if(!is_object(Product::where('sid', $sid)->first())){
            // dd('failed');
            // return view('admin.products.index');  
            return redirect()->route('products.index')->with('error', $name.' product was not created'); 
        } else {
            // return view('admin.categories.index');   
            return redirect()->route('products.index')->with('success', $name.' product created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.edit', compact('product', 'categories', 'discounts') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd('Here');
        // dd($request);
        // $this->validate($request,[
        //     'name' => 'required',
        //     'description' => 'required',
        //     'category_id' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required'
        // ]);
        // dd('Validation OK');

        $product = Product::where('id', $product->id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        if ($request->available == null){
            $product->is_available = 0;
        } else {
            $product->is_available = $request->available;
        } 
        if ($request->published == null){
            $product->is_published = 0;
        } else {
            $product->is_published = $request->published;
        }     

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        dd('Here');
    }

    public function delete()
    {
        dd('Here');
    }
}