<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('member_id', $request->user()->id)->get();
        return view('orders.index', [
            'orders' => $orders,
        ]);

    }
    public function sells(Request $request)
    {

        $orders = Order::where('seller_id', $request->user()->id)->get();
        return view('orders.sells', [
            'orders' => $orders,
        ]);
    }
    public function finish()
    {
        $finish = Order::where('status', '已完成')->get();
        return view('orders.finish', [
            'finish' => $finish,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quantity = Book::where('name', $request->name)->value('quantity');
        $books=Book::where('name',$request->name);
        $qua=$request->quantity;
        $cart=Cart::where('book_id',$request->book_id);

        if($request->has('orders')) {
        if (Auth::user()->id==$request->seller_id)
        {
            return redirect('orders')->with('error', '你為什麼要買自己賣的東西...');
        }
        else if ($quantity<$qua||$quantity==0||$qua<=0)
        {
            return redirect('orders')->with('error', '發生錯誤');
        }
        else {
            $buyer_id = auth()->user()->member;
            $buyer_id->orders()->create([
                'seller_id' => $request->seller_id,
                'member_id' => $request->user()->id,
                'book_id' => $request->book_id,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'money' => $request->money,
                'time' => now(),
                'status' => "未完成",
                'address' => $request->user()->address,
                'way' => "面交"
            ]);

            $books->update([
                'quantity' => $quantity-$qua,
            ]);

            return redirect('orders')->with('success', '下單成功!');
        }
    }elseif ($request->has('ord')){
            if (Auth::user()->id==$request->seller_id)
            {
                return redirect('orders')->with('error', '你為什麼要買自己賣的東西...');
            }
            else if ($quantity<$qua||$quantity==0||$qua<=0)
            {
                return redirect('orders')->with('error', '發生錯誤');
            }
            else {
                $buyer_id = auth()->user()->member;
                $buyer_id->orders()->create([
                    'seller_id' => $request->seller_id,
                    'member_id' => $request->member_id,
                    'book_id' => $request->book_id,
                    'name' => $request->name,
                    'quantity' => $request->quantity,
                    'money' => $request->price,
                    'time' => now(),
                    'status' => "未完成",
                    'address' => $request->user()->address,
                    'way' => "面交"
                ]);

                $books->update([
                    'quantity' => $quantity - $qua,
                ]);
                $cart->delete();

                return redirect('orders')->with('success', '下單成功!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Order::whereId($id)->update([
            'status' => "已完成",
        ]);
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
