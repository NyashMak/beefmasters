<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Hamcrest\Type\IsObject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'shop_id' => 'required'
        ]);
        // request()->request->add(['total_cost_per_employee'=>$cost_per_employee]);
        request()->request->add(['sid'=>Str::uuid()->toString()]);
        $sid = $request->sid;
        $name = $request->name;
        $input = $request->all();
        Category::create($input);

        // dd('Check if created');
        if(!is_object(Category::where('sid', $sid)->first())){
            dd('failed');
            return view('admin.categories.index');  
            // return redirect()->route('categories.index')->with('success', $name.' category created successfully');
        } else {
            
            // return view('admin.categories.index')->with('error', $name.' category was not created'); 
            // return view('admin.categories.index');   

            return redirect()->route('categories.index')->with('success', $name.' category created successfully');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $shops = Shop::all();
        return view('admin.categories.edit', compact('category','shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::where('id', $category->id)->first();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->shop_id = $request->shop_id;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        dd('HERE');
    }

    public function delete(Request $request){
        $category = Category::where('id', $request->id)->first();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');

    }
}