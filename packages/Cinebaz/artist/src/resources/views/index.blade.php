@extends('layouts.app')

@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Artist Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                    
                     <div class="container-fluid">
                        <div class="row mb-2">
                              <div class="col-sm-12">
                                 <ol class="breadcrumb">
                                 <li><a href="{{ route('admin.artist.occupation') }}" class="btn btn-primary">Occupation List</a></li></li>&nbsp;&nbsp;
                                    <li class="breadcrumb-item"><a href="{{ route('admin.artist.create') }}" class="btn btn-primary">Add Artist</a></li>
                                 </ol>
                              </div><!-- /.col -->
                        </div><!-- /.row -->
                     </div>
       
                  </div>
                </div>
                          
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table table-responsive" style="width:100%">
                         <thead>
                            <tr>
                               <th style="width:7%;">No</th>
                               <th style="width:10%;">Name</th>
                               <th style="width:10%;">Image</th>
                               <th style="width:10%;">Gender</th>
                               <th style="width:10%;">DOB</th>
                               <th style="width:10%;">Description</th>
                               <th style="width:10%;">Remarks</th>
                               <th style="width:10%;">Company</th>
                               <th style="width:7%;">Status</th>
                              
                               <th style="width:16%;">Action</th>
                            </tr>
                         </thead>
                         <tbody>                          
                         
                          @foreach ($artists as $key => $artist)
                          <tr>
                           <td>#{{$key + 1}}</td>
                           <td>{{$artist->name}}</td>
                           <td><img src="{{url('storage/'.$artist->image)}}" style="height:70px;"></td>
                           <td>
                             {{ $artist->gender  ? $artist->gender : '  Empty' }}     
                           </td>
                           <td>{{$artist->dob}}</td>
                           <td>{{$artist->description}}</td>
                           <td>{{$artist->remarks}}</td>
                           <td>{{$artist->company}}</td>
                           <td>
                            @if($artist->is_active == 'Yes')
                               <a href="{{route('admin.artist.status' , $artist->slug)}}" class="btn btn-success btn-sm">Active</a>
                            @elseif($artist->is_active == 'No')
                               <a href="{{route('admin.artist.status' , $artist->slug)}}" class="btn btn-primary btn-sm">Inactive</a> 
                            @endif   
                           </td>
                           
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <!-- <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="View" href="#"><i class="lar la-eye"></i></a> -->
                                 <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="{{url('admin/artist')}}/edit/{{$artist->slug}}"><i class="ri-pencil-line"></i></a>
                                  
                                 <a class="iq-bg-primary delete-confirm" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="{{url('admin/artist')}}/delete/{{$artist->slug}}"><i
                                       class="ri-delete-bin-line delete-confirm"></i></a>
                              </div>
                           </td>
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
</div>
 

@endsection
@push('scripts')
   @include('layouts.essential.datatable')
   <!-- delete -->
   <script type="text/javascript">
    $(function(){

      $(document).on('click','.delete-confirm',function(e){
          e.preventDefault();
          var link = $(this).attr('href');
           Swal.fire({
              title: 'Are you sure?',
              text: "You want to Delete Data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
              if (result.value){
                   // form.submit();
               window.location.href = link;
                Swal.fire(
                  'Approved!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
      });
  });
</script>


@endpush