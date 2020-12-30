<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Veritrans\Veritrans;
use App\Veritrans\Midtrans;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('page');
        Midtrans::$serverKey = 'SB-Mid-server-3_lCIgT7LKhpfV58lr-WUbmt';
        Midtrans::$isProduction = false;
        Veritrans::$serverKey = 'SB-Mid-server-3_lCIgT7LKhpfV58lr-WUbmt';
        Veritrans::$isProduction = false;
    }

    public function index()
    {
    }

    public function page()
    {
        return view('jadwal-page');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('agen');
        return view('dashboard.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $midtrans = json_decode($request->result_data);

        $jadwal = Jadwal::create([
            'order_id' => $request->order_id,
            'user_id' => Auth::id(),
            'dermaga_id' => $request->dermaga_id,
            'kapal_id' => $request->kapal_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'jumlah_muatan' => $request->muatan,
            'harga' => $request->harga,
            'bank' => $midtrans->va_numbers[0]->bank,
            'va_number' => $midtrans->va_numbers[0]->va_number,
            'pdf' => $midtrans->pdf_url,
            'status' => $midtrans->transaction_status

        ]);
        return redirect()->route('agen.jadwal.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
