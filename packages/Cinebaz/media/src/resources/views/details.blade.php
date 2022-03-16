@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <!-- Main content -->
    @if (Session::has('myexcep'))
        @dump(Session::get('myexcep'));
    @endif


    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        {{ __('Media Report') }}
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div id="chart"></div>

                                </div>
                                <div class="iq-card-footer text-center">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @include('media::part.media_info', ['sdata' => $mdata])


                        </div>

                    </div>

                    <!-- /.row -->

                </div>
            </div>
            <br>
        </div>
    </div>

<?php 
    //  $date =  new DateTime('now',new DateTimezone('Asia/Dhaka'));  
    // dump(thisweek);
    foreach($thisweek as $week){
      $unique[] = $week['unique'];
      $total[] = $week['total'];
      $cat[] = $week['date'];
    }
    // dd( $cat);
    // ($date->format('j F,Y,g:i a')) 
?>
 

@endsection

@push('scripts')
  
<script>

       var options = {
          series: [{
          name: 'unique',
          data:  <?php echo json_encode($unique);?>
        }, {
          name: 'total',
          data: <?php echo json_encode($total);?>
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          // type: 'datetime',
          categories: <?php echo json_encode($cat);?>
        },
        tooltip: {
          x: {
            // format: 'yyyy'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>
@endpush
@push('headcss')

@endpush
