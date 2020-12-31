<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Jadwal;
use App\Dermaga;
use App\Veritrans\Veritrans;
use App\Veritrans\Midtrans;
use Illuminate\Support\Facades\Auth;

class CreateJadwal extends Component
{

    public $tanggal;
    public $time = [];
    public $setWaktuMulai;
    public $setWaktuSelesai;

    public $muatan;
    public $kapal;
    public $dermaga_id;
    public $dermaga;
    public $harga;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'muatan' => 'required|numeric|min:1',
            'kapal' => 'required',
            'harga' => 'required'
        ]);
    }

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
            $dermaga = Dermaga::all();
            $status = [];
            foreach ($dermaga as $d) {
                $cek = $d->jadwal->where('waktu_mulai', $start);


                if ($cek->count() > 0) {
                    $data = $cek->first();
                    if ($data->status == 'pending' || $data->status == 'settlement') {
                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booked'];
                    } elseif ($data->status == 'expire') {
                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'expired'];
                    } else {
                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booking'];
                    }
                } else {
                    if (time() >= strtotime("$date $t:00:00")) {

                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'expired'];
                    } else {

                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booking'];
                    }
                }
            }



            if ($end > date("Y-m-d H:i:s", strtotime("$date 00:00:00 +1 day"))) {
            } else {
                $tampungWaktu[] = ['waktu_mulai' => $start, 'waktu_selesai' => $end, 'cek' => $status];
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
            $dermaga = Dermaga::all();
            $status = [];
            foreach ($dermaga as $d) {
                $cek = $d->jadwal->where('waktu_mulai', $start);

                if ($cek->count() > 0) {
                    $data = $cek->first();
                    if ($data->status == 'pending' || $data->status == 'settlement') {
                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booked'];
                    } else {
                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booking'];
                    }
                } else {
                    if (time() >= strtotime("$date $t:00:00")) {

                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'expired'];
                    } else {

                        $status[] = ['dermaga_id' => $d->id, 'dermaga' => $d->nama, 'status' => 'booking'];
                    }
                }
            }



            if ($end > date("Y-m-d H:i:s", strtotime("$date 00:00:00 +1 day"))) {
            } else {
                $tampungWaktu[] = ['waktu_mulai' => $start, 'waktu_selesai' => $end, 'cek' => $status];
            };
        }

        $this->time = $tampungWaktu;
    }

    public function updatedMuatan($value)
    {
        $this->harga = $value * 50000;
    }


    public function booking($time, $dermaga, $dermaga_id)
    {

        $this->setWaktuMulai = $time;
        $this->setWaktuSelesai = date('Y-m-d H:i:s', strtotime($time . ' +2 hours'));
        $this->dermaga = $dermaga;
        $this->dermaga_id = $dermaga_id;
        $this->reset(['muatan', 'kapal', 'harga']);
        $this->resetValidation();
    }


    public function token()
    {
        $this->validate([
            'muatan' => 'required|numeric|min:1',
            'kapal' => 'required',
            'harga' => 'required'
        ]);

        Midtrans::$serverKey = 'SB-Mid-server-3_lCIgT7LKhpfV58lr-WUbmt';
        Midtrans::$isProduction = false;
        Veritrans::$serverKey = 'SB-Mid-server-3_lCIgT7LKhpfV58lr-WUbmt';
        Veritrans::$isProduction = false;
        error_log('snap');
        $midtrans = new Midtrans;

        $transaction_details = array(
            'order_id'          => strtotime($this->setWaktuMulai) . uniqid(),
            'gross_amount'  => $this->harga
        );
        // Populate items
        $items = [
            array(
                'id'                => strtotime($this->setWaktuMulai),
                'price'         => $this->harga,
                'quantity'  => 1,
                'name'          => $this->dermaga . ' ( ' . $this->setWaktuMulai . ' )'
            ),

        ];

        // Populate customer's Info
        $customer_details = array(
            'first_name'            => "Tn/Ny. ",
            'last_name'             => Auth::user()->name,
            'address' => Auth::user()->alamat,
            'email'                     => Auth::user()->email,
            'phone'                     => Auth::user()->no_hp,

        );

        // $awal  = strtotime('now');
        // $akhir = strtotime($this->setWaktuMulai);
        // $diff  = $akhir - $awal;

        // $expired = array(
        //     'start_time' => date("Y-m-d H:i:s O", strtotime('now')),
        //     'unit' => 'minute',
        //     'duration'  => ceil($diff / 60)
        // );

        $expired = array(
            'start_time' => date("Y-m-d H:i:s O", strtotime('now')),
            'unit' => 'minute',
            'duration'  => 60
        );


        // Data yang akan dikirim untuk request redirect_url.
        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'           => $items,
            'customer_details'   => $customer_details,
            'expiry'             => $expired,
        );

        try {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            $this->dispatchBrowserEvent('midtrans-token', ['token' => $snap_token]);
        } catch (Exception $e) {
            return $e->getMessage;
        }
    }

    public function render()
    {

        return view('livewire.page.create-jadwal');
    }
}
