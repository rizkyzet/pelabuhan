<?php

namespace App\Http\Controllers\Laporan;

use App\Dermaga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDO;

class DermagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['admin', 'pimpinan'])) {

            return view('dashboard.laporan.laporan-dermaga');
        } else {
            return abort(403);
        }
    }

    public function cetak(Request $request)
    {
        if (Gate::any(['admin', 'pimpinan'])) {

            $attr = $request->validate([
                'id_dermaga' => 'required'
            ]);
            if ($attr['id_dermaga'] === 'all') {

                $dermaga = Dermaga::all();
            } else {

                $dermaga = Dermaga::where('id', $attr['id_dermaga'])->get();
            }
            $mpdf = new \Mpdf\Mpdf;
            $mpdf->AddPage('P');
            $view = view('cetak.dermaga', compact('dermaga'));
            $mpdf->WriteHTML($view);
            $mpdf->Output();
        } else {
            return abort(403);
        }
    }
}
