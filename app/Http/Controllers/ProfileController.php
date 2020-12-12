<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $response = Gate::inspect('role-area', Auth::user());
        if (!$response->allowed()) {
            return redirect()->route(Auth::user()->role->name);
        }

        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request, $type)
    {


        if ($type == 'info') {

            $request->validate([
                'name' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required|digits_between:12,13',
                'foto' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            ]);

            $user = Auth::user();
            $attr = $request->all();
            if ($request->file('foto')) {
                if ($user->foto !== 'images/profile/default.png') {
                    Storage::delete($user->foto);
                    $foto = $request->file('foto')->store('images/profile');
                    $attr['foto'] = $foto;
                } else {
                    $foto = $request->file('foto')->store('images/profile');
                    $attr['foto'] = $foto;
                }
            }


            $user->update($attr);

            if ($user->wasChanged()) {
                session()->flash('success', 'The post was updated');
            }
            // redirek ke halaman sebelumnya
            return redirect()->route(Auth::user()->role->name);
        } else {
            $user = Auth::user();
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => 'required',
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        $hashedPassword = $user->password;
                        if (Hash::check($value, $hashedPassword)) {
                            return true;
                        } else {
                            $fail($attribute . ' is invalid');
                        }
                    },
                ]
            ]);

            $attr['password'] = Hash::make($request->password);
            $user->update($attr);

            if ($user->wasChanged()) {
                session()->flash('success', 'Password was changed, please re-login');
            }
            // redirek ke halaman sebelumnya
            return redirect()->route($user->role->name . '.password');
        }
    }


    public function changePassword()
    {
        $response = Gate::inspect('role-area', Auth::user());
        if (!$response->allowed()) {
            return redirect()->route(Auth::user()->role->name);
        }
        $user = Auth::user();
        return view('change-password', $user);
    }

    public function tes()
    {
        $start = 06;
        $end = 24;
        $date = '2020-12-12';

        $tampung = [];


        for ($i = $start; $i <= $end; $i++) {
            if ($start % 2 == 0) {
                if ($i % 2 == 0) {
                    $tampung[] = $i;
                }
            } else {
                if ($i % 2 == 1) {
                    $tampung[] = $i;
                }
            }
        }

        dump($tampung);

        foreach ($tampung as $t) {

            $start = date("Y-m-d || H:i:s", strtotime("$date $t:00:00"));
            $end = date("Y-m-d || H:i:s", strtotime("$date $t:00:00 +2 hours"));

            if (time() >= strtotime("$date $t:00:00")) {
                $status = 'expired';
            } else {
                $status = 'booking';
            }

            echo $start . " - " . $end . " $status" . "<br>";
        }

        dd(strtotime("4 hours"));
    }
}
