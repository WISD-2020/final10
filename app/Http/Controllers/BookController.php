<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Console\Input\Input;

class BookController extends Controller
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
        return view('books.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'price'=>'required|numeric',
            'info'=>'required',
            'path'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->path->extension();
        $request->path->move(public_path('images'), $imageName);

        $member=auth()->user()->member;
        if($member){
            $member->books()->create([
                'name' => $request->name,
                'category' => $request->category,
                'quantity' => $request->quantity,
                'price'=>$request->price,
                'info'=>$request->info,
                'path'=>"$imageName"
            ]);


            return redirect('shops')->with('success', '成功上架!');
        }


        return redirect()->route('login')->with('error','尚未登入!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        return view('books.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        if (Gate::denies('update books', $book)) {
            abort(403);
        }
        else {
            $book = Book::findOrFail($id);
            return view('books.edit', compact('book'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $book = Book::findOrFail($id);

        if (Gate::denies('update books', $book)) {
            abort(403);
        }
        else {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'category' => 'required',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'info' => 'required',
                'path' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $imageName = time() . '.' . $request->path->extension();
            $request->path->move(public_path('images'), $imageName);
            Book::whereId($id)->update([
                'name' => $request->name,
                'category' => $request->category,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'info' => $request->info,
                'path' => "$imageName"
            ]);

            $orders=Order::where('book_id',$id);
            $orders->update([
                'name' => $request->name,
                'money' => $request->price,
            ]);

            return redirect('shops')->with('success', '成功更新');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/shops');
    }
    public function search(Request $request)
    {
        $searchs= $request->input('searchs');
        $category= $request->input('category');
        $cates=DB::table('books')->select('category')->distinct()->get();

        if($request->has('searchs')) {
            $sears = Book::where("name", "like", '%' . $searchs . '%')
                        ->get();
        }
        if($request->has('category')){
            $sears = Book::where('category',$category)->get();

        }
        return view('books.search',[
            'sears' => $sears,'cates' => $cates,
        ]);

    }
}
