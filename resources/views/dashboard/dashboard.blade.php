@extends('dashboard/layouts/app')
@section('title','Dashboard')
@section('content')
@include('dashboard/layouts/_partials/alert')
<div class="card">
  <div class="card-header">
    <h5>Dashboard</h5>
  </div>
  <div class="card-body">
    <div class="row justify-content-center">
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-warning">
          <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="text-value-lg">{{collect(json_decode($jumlahJadwal,TRUE))->sum()}}</div>
              <div>Jumlah Jadwal</div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:150px;">
            <canvas class="chart" id="card-chart3" height="70"></canvas>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
          <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="text-value-lg">{{collect(json_decode($jumlahUser,TRUE))->sum()}}</div>
              <div>Jumlah User</div>
            </div>
          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:150px;">
            <canvas class="chart" id="card-chart1" height="70"></canvas>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger">
          <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
              <div class="text-value-lg">{{collect(json_decode($jumlahDermaga,TRUE))->sum()}}</div>
              <div>Jumlah dermaga</div>
            </div>

          </div>
          <div class="c-chart-wrapper mt-3 mx-3" style="height:150px;">
            <canvas class="chart" id="card-chart2" height="70"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@push('bottom-css')
<link href="{{asset('/css/coreui-chartjs.css')}}" rel="stylesheet">
@endpush
@push('bottom-js')
{{-- <script src="{{asset('js/coreui.bundle.min.js')}}"></script> --}}
<script src="{{asset('js/coreui-chartjs.bundle.js')}}"></script>
<script src="{{asset('js/coreui-utils.js')}}"></script>

<script>
  let jumlahUser =<?php echo $jumlahUser ?>;
  let jumlahDermaga =<?php echo $jumlahDermaga ?>;
  let jumlahJadwal =<?php echo $jumlahJadwal ?>;


const cardChart1 = new Chart(document.getElementById('card-chart1'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Jumlah',
        backgroundColor: 'transparent',
        borderColor: 'rgba(255,255,255,.55)',
        pointBackgroundColor: coreui.Utils.getStyle('--primary'),
        data: jumlahUser,
      }
    ]
  },
  options: {
    maintainAspectRatio: false,
    responsive: true,
    // tooltips: {
    //   y: -100,
    //   caretY: -100,
    // },

    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          color: 'transparent',
          zeroLineColor: 'transparent'
        },
        ticks: {
          fontSize: 2,
          fontColor: 'transparent'
        }
      }],
      yAxes: [{
        display: false,
        ticks: {
          display: false,
          // min: 0,
          // max: 100
        }
      }]
    },
    elements: {
      line: {
        borderWidth: 1
      },
      point: {
        radius: 4,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
})

const cardChart2 = new Chart(document.getElementById('card-chart2'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Jumlah',
        backgroundColor: 'transparent',
        borderColor: 'rgba(255,255,255,.55)',
        pointBackgroundColor: coreui.Utils.getStyle('--primary'),
        data: jumlahUser,
      }
    ]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          color: 'transparent',
          zeroLineColor: 'transparent'
        },
        ticks: {
          fontSize: 2,
          fontColor: 'transparent'
        }
      }],
      yAxes: [{
        display: false,
        ticks: {
          display: false,
          // min: 1,
          // max: 89
        }
      }]
    },
    elements: {
      line: {
        borderWidth: 1
      },
      point: {
        radius: 4,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
})

const cardChart3 = new Chart(document.getElementById('card-chart3'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Jumlah',
        backgroundColor: 'transparent',
        borderColor: 'rgba(255,255,255,.55)',
        pointBackgroundColor: coreui.Utils.getStyle('--primary'),
        data: jumlahJadwal,
      }
    ]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          color: 'transparent',
          zeroLineColor: 'transparent'
        },
        ticks: {
          fontSize: 2,
          fontColor: 'transparent'
        }
      }],
      yAxes: [{
        display: false,
        ticks: {
          display: false,
          // min: 1,
          // max: 89
        }
      }]
    },
    elements: {
      line: {
        borderWidth: 1
      },
      point: {
        radius: 4,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
})
</script>
@endpush