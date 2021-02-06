<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Dermaga;
use App\Jadwal;

class LaporanDermaga extends Component
{

    public $idDermaga = ' ';
    public $dermaga = [];
    public $dataDermaga = [];
    public  $kapalMasuk = [];

    public function mount()
    {
        $this->dataDermaga = Dermaga::all();
        $this->dermaga = Dermaga::all();
    }

    public function updated($field, $data)
    {

        $this->validateOnly($field, [
            'idDermaga' => 'required'
        ]);

        $this->dataDermaga = Dermaga::where('id', $data)->get();
    }

    public function render()
    {
        return view('livewire.laporan.laporan-dermaga');
    }
}
