<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('layouts.admin.admin_users_list', ['users' => $users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $users = User::find($id);
        return view('layouts.edit_users')->with('user', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        if (Auth::user()->is_admin()) {
            $username = $request->input('name');
            $email = $request->input('email');
            $role = $request->input('role');

            $data = array('name' => $username, "email" => $email, "role" => $role);
            DB::table('users')->where('id', $user->id)->update($data);
            return redirect('/users')->withErrors('Profile updated successfuly')->withInput();
        } else {
            return redirect('/')->withErrors('You have insufficient permisions')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (Auth::user()->is_admin()) {
            $user->delete();
            return redirect('/users')->withErrors('User deleted successfuly')->withInput();
        } else {
            return redirect('/')->withErrors('You have insufficient permisions')->withInput();
        }
    }
}
