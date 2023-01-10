<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Address;
use App\Models\User_Payment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
                // $request->validate([
                //     'first_name' => 'required',
                //     'last_name' => 'required',
                //     'email' => 'required',
                // ]);
                request()->request->add(['name'=> $request->first_name.' '.$request->last_name]);
                request()->request->add(['is_customer'=>1]);
                $input = $request->all();
                User::create($input);

                $user = User::where('email', '=', $request->email)->first();

                if(is_object($user)){
                    return redirect()->back()->with('success','Account created successfully');
                }
                dd($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
