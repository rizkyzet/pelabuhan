<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if (Gate::any(['admin', 'pimpinan'])) {

            // $user = User::orderBy('role_id', 'desc')->get();
            $user = User::where('email', '!=', \Auth::user()->email)->get();

            return view('dashboard.user.index', compact('user'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        $role = \App\Role::all();
        return view('dashboard.user.create', compact('role'));
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
            'name' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users,email',
            'no_hp' => 'required|digits_between:12,13',
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'role_id' => 'required'
        ]);


        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => 'images/profile/default.png',
            'role_id' => $request->role_id
        ]);

        return redirect()->route(\Auth::user()->role->name . '.user.index')->with('success', 'User berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = \App\Role::all();
        return view('dashboard.user.edit', ['user' => $user, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request->filled('password')) {
            $attr = $request->validate([
                'name' => 'required',
                'alamat' => 'required',
                'email' => 'required|unique:users,email,' . $user->email . ',email',
                'no_hp' => 'required|digits_between:12,13',
                'password' => ['string', 'min:5', 'confirmed'],
                'role_id' => 'required'
            ]);
            $attr['password'] = Hash::make($request->password);
        } else {
            $attr = $request->validate([
                'name' => 'required',
                'alamat' => 'required',
                'email' => 'required|unique:users,email,' . $user->email . ',email',
                'no_hp' => 'required|digits_between:12,13',
                'role_id' => 'required'
            ]);
        }

        $user->update($attr);

        if ($user->wasChanged()) {
            return redirect()->route(\Auth::user()->role->name . '.user.index')->with('success', 'User berhasil diubah!');
        } else {
            return redirect()->route(\Auth::user()->role->name . '.user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route(\Auth::user()->role->name . '.user.index')->with('success', 'User berhasil dihapus!');
    }
}
