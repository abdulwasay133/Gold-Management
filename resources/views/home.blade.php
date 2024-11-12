@extends('layouts.app')

@section('content')
<div class="container mt-5">

  <div
  class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4 mt-3"
>
  <div>
    <h3 class="fw-bold mb-3 mt-4">Dashboard</h3>
    <h6 class="op-7 mb-2">Gold Shop Management System</h6>
  </div>

</div>



  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div
                class="icon-big text-center icon-primary bubble-shadow-small"
              >
                <i class="fas fa-users"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Total Payable</p>
                <h4 class="card-title">Rs: {{$totalpayable}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div
                class="icon-big text-center icon-info bubble-shadow-small"
              >
                <i class="fas fa-user-check"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Total Receivable</p>
                <h4 class="card-title">Rs: {{$totalreceive}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div
                class="icon-big text-center icon-success bubble-shadow-small"
              >
                <i class="fas fa-luggage-cart"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Today Sales</p>
                <h4 class="card-title">Rs: {{$totalsale}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div
                class="icon-big text-center icon-secondary bubble-shadow-small"
              >
                <i class="far fa-check-circle"></i>
              </div>
            </div>
            <div class="col col-stats ms-3 ms-sm-0">
              <div class="numbers">
                <p class="card-category">Today Purchase</p>
                <h4 class="card-title">Rs: {{$totalpurchase}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-md-8">
    <div class="card card-round">
      <div class="card-header">
        <div class="card-head-row">

          <div class="card-title">Sale Statistics</div>
          <div class="card-tools">
            <a
              href="#"
              class="btn btn-label-success btn-round btn-sm me-2"
            >
              <span class="btn-label">
                <i class="fa fa-pencil"></i>
              </span>
              Export
            </a>
            <a href="#" class="btn btn-label-info btn-round btn-sm">
              <span class="btn-label">
                <i class="fa fa-print"></i>
              </span>
              Print
            </a>
          </div>


        </div>
      </div>
      <div class="card-body">
        <div class="chart-container" style="min-height: 375px">
          <div id="sales" class="mt-5"></div>
        </div>
        {{-- <div id="myChartLegend"></div> --}}
      </div>
    </div>
  </div>





        <div class="col-md-4"><div id="pai"></div></div>
        <div class="col-md-3"><div id="asset"></div></div>
    
  </div>

    
 
</div>

<script>
        
        var options = {
          series: [{
            name: "Desktops",
            data: {{$salevalue}}
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Last 30 Dasy Sales Graph',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: {{$salelabel}},
        }
        };

        var chart = new ApexCharts(document.querySelector("#sales"), options);
        chart.render();



        
      
        
      

        var options = {
          series: [{
          name: 'Inflation',
          data:  [
                    {{ $chartData['debits'] }},
                    {{ $chartData['credits'] }},
                    {{ $chartData['expenses'] }}
                ]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ['Debits', 'Credits', 'Expenses'],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        title: {
          text: 'Last 30 Days Cash Flow',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#pai"), options);
        chart.render();
</script>


@endsection
