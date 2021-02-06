<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Kapal;

class LaporanKapal extends Component
{

    public $kapal = [];
    public $idKapal = ' ';
    public $dataKapal = [];
    public function mount()
    {
        $this->kapal = Kapal::all();
        $this->dataKapal = Kapal::all();
    }



    public function updated($field)
    {

        $attr = $this->validateOnly($field, [
            'idKapal' => 'required'
        ]);



        $this->dataKapal = Kapal::where('id', $attr['idKapal'])->get();
    }

    public function render()
    {

        return view('livewire.laporan.laporan-kapal');
    }
}
