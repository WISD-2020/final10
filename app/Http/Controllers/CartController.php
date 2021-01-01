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
        if($request->has('addcart')) {
            $quantity = Book::where('name',$request->name)->value('quantity');//資料庫數量

            $qq=$request->quantity;//加入購物車數量
            $qq=$quantity-$qq;//加入購物車後數量

            $book = Cart::where('book_id', $request->book_id)->value('book_id');
            $bookid=$request->book_id;

            if (Auth::id()==$request->seller_id) {
                return back()->with('error', '此為您的商品，無法加入購物車');

            }elseif ($quantity<=0){
                return back()->with('error', '此商品已售完');;

            }elseif ($quantity>0){
                if (Cart::where('member_id',Auth::id())&&$book==$bookid) {
                    return back()->with('error', '購物車已有此商品');

                }else{
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
        //
    }
}
