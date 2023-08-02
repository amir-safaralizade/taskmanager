<?php

namespace App\Http\Controllers\ApiControllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\cart\CartCollection;
use App\Http\Resources\cart\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts =  new CartCollection(Cart::all());
        return $this->suucessResponce(200 , $carts , 'List of carts received successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title' => ['required' , 'unique:carts'],
            'user_id' => ['required' , 'integer' ],
        ]);

        if ($validator->fails()){
            return $this->failResponce(422 , $validator->messages());
        }

        $cart = Cart::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        $cart = new CartResource($cart);

        return $this->suucessResponce(200 , $cart , 'Cart Created SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $cart = new CartResource($cart);
        return $this->suucessResponce(200  , $cart , 'All Carts Received Successfully');
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
        $validator = Validator::make($request->all() , [
            'title' => ['required'],
            'user_id' => ['required' , 'integer' ],
        ]);

        if ($validator->fails()){
            return $this->failResponce(422 , $validator->messages());
        }

        $cart->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);

        $cart = new CartResource($cart);
        return $this->suucessResponce(200 , $cart , 'Cart updated successfully');
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
        $cart = new CartResource($cart);
        return $this->suucessResponce(200 , $cart , 'cart Deleted SuccessFully');
    }
}
