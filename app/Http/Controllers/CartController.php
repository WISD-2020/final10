<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
    public function create(Request $request)
    {

        $carts = Cart::where('member_id', Auth::id())->get();
//        dd($carts);
        return view('carts.index', [
            'carts' => $carts,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search= $request->input('add');
        $bookadd= $request->input('addcart');
        if($request->has('addcart')) {//若按了"加入購物車"
            $quantity = Book::where('name',$request->name)->value('quantity');//資料庫數量

            $bb=Cart::where('member_id', Auth::id())->get();
            $bb = $bb->toArray();
            $aa = array();
            for($i = 0;$i < count($bb);$i++){
                array_push($aa,$bb[$i]['book_id']);
            }

            if (Auth::id()==$request->seller_id) {//若為自己的商品
                return back()->with('error', '此為您的商品，無法加入購物車');

            }elseif ($quantity<=0){//若此商品數量為零
                return back()->with('error', '此商品已售完');;

            }elseif ($quantity>0){//若還有商品
                    if (is_integer(array_search($request->book_id,$aa))) {
                        return back()->with('error', '購物車已有此商品');

                    }else{//加入購物車
                        Cart::create([
                            'member_id' => $request->user()->id,
                            'book_id' => $request->book_id,
                            'quantity' => $request->quantity,
                        ]);
                        return back()->with('success', '成功加入購物車!');

                }


            }

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/carts')->with('success', '商品已移除!');

    }
}
