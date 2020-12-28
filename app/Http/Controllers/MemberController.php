<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop($id)
    {
        $books=Book::where('member_id',$id)->get();
        return view('members.shop',['books'=>$books]);
    }

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
        $exist=Member::find($request->user_id);
        if($exist)
        {
            return redirect('admins')->with('error', '這位使用者已經是會員了!');
        }
        else {
            $member = new Member;
            $member->id=$request->user_id;
            $member->user_id = $request->user_id;
            $member->sex = $request->sex;
            $member->email = $request->email;
            $member->address = $request->address;
            $member->tel = $request->tel;
            $member->save();
            return redirect('admins')->with('success', '已登入為會員!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        if ($member->id == Auth::id()&&$member->type==0) {

            $members = User::where('id', $member->id)->firstOrFail();
            return View::make('members.show',[
                'name'=>$members->name,
                'sex'=>$members->sex,
                'email'=>$members->email,
                'address'=>$members->address,
                'tel'=>$members->tel,
            ]);
        }
        else
            return redirect()->route('members.show',[ Auth::id()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('/admins');
    }

    public function logout(Member $member)
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home');
        }
    }
}
