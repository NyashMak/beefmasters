<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Inventory;
use App\Models\Order_Item;
use Hamcrest\Type\IsObject;
use Illuminate\Support\Str;
use App\Models\Order_Detail;
use App\Models\User_Address;
use App\Models\User_Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB; use Mail; use Sentinel; use Activation; use Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_customer', 0)->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login (){
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUser(Request $request){
        
        $user = User::where('email', $request->email)->first();
        if($user){
            if ($user->is_customer == 0) {
                if (Hash::check($request->password, $user->password)) {

                    Auth::login($user, $remember = true);

                    return redirect()->route('dashboard');
                }
                else{
                    return redirect()->back()->with('error', 'The email or password is incorrect');
                }
            }
        } else{
            return redirect()->back()->with('error', 'The email or password is incorrect');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect()->route('admin-login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        $user = new User();
        $user->sid = Str::uuid()->toString();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->is_customer = 0;
        $password = Hash::make($request->password);
        $user->password = $password;
        $result = $user->save();

        // dd($result);
        if($result){
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
        else{
            return redirect()->back()->with('error', 'User creation failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('sid', $id)->first();
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('sid', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->is_customer = 0;
        if ($request->new_password != '') {
            $password = Hash::make($request->new_password);
            $user->password = $password;
        }
        $result = $user->save();

        // dd($result);
        if($result){
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        }
        else{
            return redirect()->back()->with('error', 'User update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $user = User::where('sid', $id)->first();
        $result = $user->delete();
        if($result){
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }
        else{
            return redirect()->back()->with('error', 'User deletion failed');
        }
    }
}
