<?php

namespace App\Http\Controllers\WebControllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::all();
        return  view('admin.carts.index')->with(['carts' => $carts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role' , 'user')->get();
        return view('Admin.carts.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => ['required' , 'unique:carts'],
            'user_id' => ['required' , 'integer' ],
        ]);

        $cart = Cart::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        session()->flash('success' , 'Cart Created SuucessFully!');
        return redirect(route('carts.index'));
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
    public function edit(Cart $cart)
    {
        $users = User::where('role' , 'user')->get();
        return view('admin.carts.edit')->with(['cart' => $cart , 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $this->validate($request , [
            'title' => ['required'],
            'user_id' => ['required' , 'integer' ],
        ]);

        $cart->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        session()->flash('success' , 'Cart Updated SuccessFully');
        return redirect(route('carts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->tasks()->delete();
        $cart->delete();

        session()->flash('success' , 'Cart Deleted SuccessFully');
        return back();
    }
}
