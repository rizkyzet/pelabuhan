<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = 1;
        $jumlahUser = [];
        while ($bulan <= 12) {
            $user = \App\User::whereMonth('created_at', $bulan)->whereYear('created_at', date('Y'))->count();
            $jumlahUser[] = $user;
            $bulan++;
        };

        $bulan = 1;
        $jumlahDermaga = [];
        while ($bulan <= 12) {
            $dermaga = \App\Dermaga::whereMonth('created_at', $bulan)->whereYear('created_at', date('Y'))->count();
            $jumlahDermaga[] = $dermaga;
            $bulan++;
        };
        $bulan = 1;
        $jumlahDermaga = [];
        while ($bulan <= 12) {
            $dermaga = \App\Dermaga::whereMonth('created_at', $bulan)->whereYear('created_at', date('Y'))->count();
            $jumlahDermaga[] = $dermaga;
            $bulan++;
        };
        $bulan = 1;
        $jumlahJadwal = [];
        while ($bulan <= 12) {
            $jadwal = \App\Jadwal::where('status', 'settlement')->whereMonth('waktu_mulai', $bulan)->whereYear('waktu_mulai', date('Y'))->count();
            $jumlahJadwal[] = $jadwal;
            $bulan++;
        };



        return view('dashboard.dashboard', ['jumlahUser' => json_encode($jumlahUser), 'jumlahDermaga' => json_encode($jumlahDermaga), 'jumlahJadwal' => json_encode($jumlahJadwal)]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
