<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Jadwal;
use Illuminate\Support\Carbon;

class LaporanKegiatanKapal extends Component
{

    public $total = 0;
    public $tanggalMulai;
    public $tanggalAkhir;
    public $jadwal;

    public function mount()
    {
        $this->tanggalMulai = date('Y-m-01');
        $this->tanggalAkhir = date('Y-m-t');
        $this->jadwal = Jadwal::where([['status', 'settlement'], ['waktu_mulai', '>=', $this->tanggalMulai], ['waktu_mulai', '<=', date($this->tanggalAkhir . ' 23:59:59')]])->get();
    }


    public function updated($field)
    {

        $this->validateOnly($field, [
            'tanggalMulai' => 'required',
            'tanggalAkhir' => 'required',
        ]);
        $this->jadwal = Jadwal::where([['status', 'settlement'], ['waktu_mulai', '>=', $this->tanggalMulai], ['waktu_mulai', '<=', date($this->tanggalAkhir . ' 23:59:59')]])->get();
    }

    public function render()
    {


        return view('livewire.laporan.laporan-kegiatan-kapal');
    }
}
