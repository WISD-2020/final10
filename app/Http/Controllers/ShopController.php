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

        return view('shops.index');
    }

    public function create()
    {

        return view('shops.create');
    }

}
