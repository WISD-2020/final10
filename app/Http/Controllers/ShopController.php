<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $member=auth()->user()->member;
        $books=$member->books()->get();
        return view('shops.index', [
            'books' => $books,
        ]);
    }

    public function create()
    {

        return view('shops.create');
    }

}
