<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Jadwal;

class CreateJadwal extends Component
{

    public $tanggal;
    public $time = [];

    public function mount()
    {
        $this->tanggal = date('Y-m-d');


        $start = 00;
        $end = 24;
        $date = $this->tanggal;

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



        foreach ($tampung as $t) {

            $start = date("Y-m-d H:i:s", strtotime("$date $t:00:00"));
            $end = date("Y-m-d H:i:s", strtotime("$date $t:00:00 +2 hours"));
            $cek = Jadwal::where('waktu_mulai', $start)->count();

            if ($cek > 0) {
                $status = 'booked';
            } else {

                if (time() >= strtotime("$date $t:00:00")) {
                    $status = 'expired';
                } else {
                    $status = 'booking';
                }
            }


            if ($end > date("Y-m-d H:i:s", strtotime("$date 00:00:00 +1 day"))) {
            } else {
                $tampungWaktu[] = ['waktu_mulai' => $start, 'waktu_selesai' => $end, 'status' => $status];
            };
        }

        $this->time = $tampungWaktu;
    }


    public function updatedTanggal()
    {
        $start = 00;
        $end = 24;
        $date = $this->tanggal;

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



        foreach ($tampung as $t) {

            $start = date("Y-m-d H:i:s", strtotime("$date $t:00:00"));
            $end = date("Y-m-d H:i:s", strtotime("$date $t:00:00 +2 hours"));
            $cek = Jadwal::where('waktu_mulai', $start)->count();

            // cek
            if ($cek > 0) {
                $status = 'booked';
            } else {

                if (time() >= strtotime("$date $t:00:00")) {
                    $status = 'expired';
                } else {
                    $status = 'booking';
                }
            }



            if ($end > date("Y-m-d H:i:s", strtotime("$date 00:00:00 +1 day"))) {
            } else {
                $tampungWaktu[] = ['waktu_mulai' => $start, 'waktu_selesai' => $end, 'status' => $status];
            };
        }
        $this->time = $tampungWaktu;
    }

    public function render()
    {
        return view('livewire.page.create-jadwal');
    }
}
