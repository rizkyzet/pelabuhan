<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KapalController extends Controller
{
    public function index()
    {

        return view('dashboard.laporan.laporan-kapal');
    }

    public function cetak(Request $request)
    {
        if (Gate::any(['pimpinan', 'admin'])) {
            $attr = $request->validate([
                'id_kapal' => 'required'
            ]);
            $kapal = \App\Kapal::where('id', $attr['id_kapal'])->get();
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->AddPage('P');
            $view = view('cetak.kapal', compact('kapal'));
            $mpdf->writeHtml($view);
            $mpdf->output();
        } else {
            return abort(403);
        }
    }


    public function cetak2()
    {

        if (Gate::any(['pimpinan', 'admin'])) {

            $kapal = \App\Kapal::all();
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->AddPage('P');
            $view = view('cetak.kapal', compact('kapal'));
            $mpdf->writeHtml($view);
            $mpdf->output();
        } else {
            return abort(403);
        }
    }
}
