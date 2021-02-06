<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['admin', 'pimpinan'])) {

            return view('dashboard.laporan.laporan-jadwal');
        } else {
            return abort('403');
        }
    }

    public function cetak_jadwal(Request $request)
    {

        if (Gate::any(['pimpinan', 'admin'])) {
            $attr = $request->validate([
                'tanggalMulai' => 'required',
                'tanggalAkhir' => 'required'
            ]);
            $jadwal = Jadwal::where([['status', 'settlement'], ['waktu_mulai', '>=', $attr['tanggalMulai']], ['waktu_mulai', '<=', date($attr['tanggalAkhir'] . ' 23:59:59')]])->get();

            $mpdf = new \Mpdf\Mpdf;
            $view = view('cetak.kegiatan-kapal', compact('jadwal'));
            $mpdf->AddPage('P');
            $mpdf->WriteHTML($view);
            $mpdf->Output();
        } else {
            return abort(403);
        }
    }
}
