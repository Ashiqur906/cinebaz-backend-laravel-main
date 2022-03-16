@extends('layouts.app')
@section('content')
      <!-- Page Content  -->
  <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8">
                  <div class="row">
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0">
                                       Members
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-primary">
                                    <i class="las la-eye"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+{{ $members/1000 }}K</h4>
                                 <!-- <p class="mb-0 text-primary"><span><i class="fa fa-caret-down mr-2"></i></span>35%</p> -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                       Medias
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-warning">
                                    <i class="lar la-star"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+{{ $medias }}</h4>
                                 <p class="mb-0 text-warning"><span><i class="fa fa-caret-up mr-2"></i></span>50%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-capitalize">
                                    <p class="mb-0 font-size-14">
                                       Downloaded
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-info">
                                    <i class="las la-download"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+1M</h4>
                                 <p class="mb-0 text-info"><span><i class="fa fa-caret-up mr-2"></i></span>80%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="iq-cart-text text-uppercase">
                                    <p class="mb-0 font-size-14">
                                       Visitors
                                    </p>
                                 </div>
                                 <div class="icon iq-icon-box-top rounded-circle bg-success">
                                    <i class="lar la-user"></i>
                                 </div>
                              </div>
                              <div class="d-flex align-items-center justify-content-between mt-3">
                                 <h4 class=" mb-0">+2M</h4>
                                 <p class="mb-0 text-success"><span><i class="fa fa-caret-up mr-2"></i></span>80%</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                           <h4 class="card-title">Top Rated Item </h4>
                        </div>
                        <div id="top-rated-item-slick-arrow" class="slick-aerrow-block"></div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row top-rated-item mb-0">
                        @foreach($playLog as $play)
                           <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                              <div class="iq-card mb-0">
                                 <div class="iq-card-body p-0">
                                    <div class="iq-thumb">
                                       <a href="javascript:void(0)">
                                          <img src="{{asset( $play->media && $play->media->featuredL ? 'storage/'.$play->media->featuredL->small : null )}}" class="img-fluid w-100 img-border-radius" alt="">
                                       </a>
                                    </div>
                                    <div class="iq-feature-list">
                                       <h6 class="font-weight-600 mb-0">{{$play->media ? $play->media->title_en : null}}</h6>
                                       <p class="mb-0 mt-2">{{$play->media && $play->media->video_nature_id == '1' ? 'Movie' : 'TV Show'}}</p>
                                       <!-- <div class="d-flex align-items-center my-2">
                                          <p class="mb-0 mr-2"><i class="lar la-eye mr-1"></i> 134</p>
                                          <p class="mb-0 "><i class="las la-download ml-2"></i> 30 k</p>
                                       </div> -->
                                    </div>
                                 </div>
                              </div>
                           </li>
                        @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="iq-card iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header">
                        <div class="iq-header-title">
                           <h4 class="card-title text-center">Media Summery</h4>
                        </div>
                     </div>
                     <div class="iq-card-body pb-0">
                        <div id="view-chart-01">
                        </div>
                        <div class="row mt-1">
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-primary"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Free Movies
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-warning"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Premum Movies
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-info"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height"> Released Movies
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                              <div class="iq-card">
                                 <div class="iq-card-body">
                                    <div class="media align-items-center">
                                       <div class="iq-user-box bg-danger"></div>
                                       <div class="media-body text-white">
                                          <p class="mb-0 font-size-14 line-height">Upcoming Movies
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12  col-lg-6">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex align-items-center justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Categories</h4>
                        </div>
                     </div>
                     <div class="iq-card-body p-0">
                        <div id="view-chart-03"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex align-items-center justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Top Category</h4>
                        </div>
                        <!-- <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                           <div class="iq-custom-select d-inline-block sea-epi s-margin">
                              <select name="cars" class="form-control season-select">
                                 <option value="season1">Today</option>
                                 <option value="season2">This Week</option>
                                 <option value="season2">This Month</option>
                              </select>
                           </div>
                        </div> -->
                     </div>
                     <div class="iq-card-body row align-items-center">
                        <div class="row">
                           <div class="col-lg-12">
                              <div id="view-chart-02" class="view-cahrt-02"></div>
                           </div>
                        </div>
                        <div class="row list-unstyled mb-0 pb-0">
                           @foreach($topcategories as $Tcategory)
                           @if(count($Tcategory->medias) > 0)
                           <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
                              <div class="iq-progress-bar progress-bar-vertical iq-bg-primary">
                                 <span class="bg-primary" data-percent="100" style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                              </div>
                              <div class="media align-items-center">
                                 <div class="rounded mr-3 iq-bg-primary"><img src="{{asset(count($Tcategory->images)>0 ? $Tcategory->images[0]->small : null)}}" style="height: 70px;"></div>
                                 <div class="media-body text-white">
                                    <h6 class="mb-0 font-size-14 line-height">{{$Tcategory->title_english}}</h6>
                                    <small class="text-primary mb-0">+{{ count($Tcategory->medias) }}</small>
                                 </div>
                              </div>
                           </div>
                           @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Media Orders ( {{ date('F',strtotime("-1 month")) }} - {{ date('F') }} )</h4>
                        </div>
                        <!-- <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                           <div class="iq-custom-select d-inline-block sea-epi s-margin">
                              <select name="cars" class="form-control season-select">
                                 <option value="season1">Most Likely</option>
                                 <option value="season2">Unlikely</option>
                              </select>
                           </div>
                        </div> -->
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table movie_table" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width:20%;">Medias</th>
                                    <th style="width:20%;">Name</th>
                                    <th style="width:10%;">Email</th>
                                    <th style="width:20%;">Phone</th>
                                    <th style="width:10%;">Status</th>
                                    <th style="width:10%;">Amount</th>
                                    <th style="width:20%;">Date</th>
                                    <th style="width:10%;">Transaction ID/Code</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($orderList as $order)
                                 <tr>
                                    <td>
                                       <div class="media align-items-center">
                              
                                          @foreach($order->Details as $details)
                                           
                                          <div class="iq-movie">
                                             @if($details->medias && $details->medias->featuredL)
                                               <a href="javascript:void(0);"><img src="{{asset( $details->medias ?'storage/'.$details->medias->featuredL->small : 'assets/backend/images/movie-thumb/01.jpg' )}}" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                                             @endif
                                          </div>
                                          <div class="media-body text-white text-left ml-3">
                                             <p class="mb-0">{{$details->medias ? $details->medias->tittle_en : null}}</p>
                                             <small>{{$details->medias ? $details->medias->discount_price : null}} {{ $order->currency }}</small>
                                          </div>
                                          @endforeach
                                       </div>
                                    </td>
                                    <td> {{ $order->name }} </td>
                                    <td><i class="lar la-star mr-2"></i> {{ $order->email }} </td>
                                    <td> {{ $order->phone }} </td>
                                    <td> {{ $order->sub_status }} </td>
                                    <td> {{ $order->amount }} {{ $order->currency }}</td>
                                    <td>{{ date('dM, Y',strtotime($order->created_at)) }}</td>
                                    <td> {{ $order->code }} </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/apexcharts.js') }}"></script>
<?php 
   foreach($categories as $category){
      $CatCount[] = count($category->medias);
      $Cat[]      = $category->title_english;
   }
?>
<script>
   if(jQuery('#view-chart-01').length){
      var options = {
         series: [{{ $freeMedia }}, {{ $premumMedia }}, {{ $releasedMedia }}, {{ $upcommingMedia }}],
         chart: {
         width: 250,
         type: 'donut',
      },
      colors:['#e20e02', '#f68a04', '#007aff','#545e75'],
      labels: ["Free Movies", "Premum Movies", "Released Movies", "Upcoming Movies"],
      dataLabels: {
         enabled: false
      },
      stroke: {
         show: false,
         width: 0
      },
      legend: {
         show: false,
      },
      responsive: [{
         breakpoint: 480,
         options: {
         chart: {
            width: 200
         },
         legend: {
            position: 'bottom'
         }
         }
      }]
      };

      var chart = new ApexCharts(document.querySelector("#view-chart-01"), options);
      chart.render();
      
   }
</script>
<script>
   if(jQuery('#view-chart-02').length){
      var options = {
         series: <?php echo json_encode($CatCount);?>,
         chart: {
         width: 250,
         type: 'donut',
      },
      colors:['#e20e02','#83878a', '#007aff','#f68a04', '#14e788','#545e75','#fbbc05','#28729d','#ea4335','#8ca116','#10c40d','#f8f8f8'],
      labels: <?php echo json_encode($Cat);?>,
      dataLabels: {
         enabled: false
      },
      stroke: {
         show: false,
         width: 0
      },
      legend: {
         show: false,
         formatter: function(val, opts) {
         return val + " - " + opts.w.globals.series[opts.seriesIndex]
         }
      },
      responsive: [{
         breakpoint: 480,
         options: {
         chart: {
            width: 200
         },
         legend: {
            position: 'bottom'
         }
         }
      }]
      };

      var chart = new ApexCharts(document.querySelector("#view-chart-02"), options);
      chart.render();
   }
</script>
<script>
   var options = {
      series: [{
      name: 'This Month',
      data: <?php echo json_encode($CatCount);?>
   }],
   colors:['#d38430'],
      chart: {
      type: 'bar',
      height: 230,
      foreColor: '#D1D0CF'
   },
   plotOptions: {
      bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
      },
   },
   dataLabels: {
      enabled: false
   },
   stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
   },
   xaxis: {
      categories: <?php echo json_encode($Cat);?>,
   },
   yaxis: {
      title: {
      text: ''
      }
   },
   fill: {
      opacity: 1
   },
   tooltip: {
      enabled: false,
      y: {
      formatter: function (val) {
         return "$ " + val + " thousands"
      }
      }
   }
   };

   var chart = new ApexCharts(document.querySelector("#view-chart-03"), options);
   chart.render();
</script>
@endsection
