<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \YaroslavMolchan\Rbac\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "password" => 'required',
            "password_confirmation" => 'required|same:password',
            "roles" => 'required',
        ],[
            "name.required" => 'This field is required.',
            "email.required" => 'This field is required.',
            "password.required" => 'This field is required.',
            "password_confirmation.required" => 'This field is required.',
            "password_confirmation.same" => 'Password Confirmation should match the Password.',
            "roles.required" => 'This field is required.',
        ]);

        event(new Registered($user = User::FirstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])));

        foreach ($request->roles as $id_role) {
            $id = (int) $id_role;
            $user->attachRole($id);
        }
        return redirect(Route('user.show',$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
        $roles = Role::all();
        return view('users.show_user', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::FindOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email, 
        ]);

        return redirect(Route('user.show',$user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
    }

    public function affecter_role(Request $request)
    {
        $user = User::FindOrFail($request->id_user);
        foreach ($request->roles as $id_role) {
            $id = (int) $id_role;
            $user->attachRole($id);
        }
        return redirect(Route('user.show',$user->id));
    }

    public function detache_role($id_user,$id_role)
    {
        $user = User::FindOrFail($id_user);
        $user->detachRole($id_role);
        return redirect()->route('user.show', $user->id);
    }

    public function update_user(Request $request, $id)
    {
        $user = User::FindOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email, 
        ]);

        return redirect('/profile');
    }

    public function update_password(Request $request, $id)
    {
        if(!(Hash::check($request->get('current'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        } 
        if(strcmp($request->get('newpassword'), $request->get('confirmnewpassword')) != 0){
            return redirect()->back()->with('error', 'New Password must be same as your comfirmed password', 422);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get('newpassword'));
        $user->save();

        return redirect()->back()->with('succes', 'password changed successfully', 422);
    }
}
