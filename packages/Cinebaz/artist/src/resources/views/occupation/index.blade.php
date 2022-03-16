@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Occupation Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                    
                     <div class="container-fluid">
                        <div class="row mb-2">
                              <div class="col-sm-12">
                                 <ol class="breadcrumb">
                                 <li><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ArtistOccupation">Add Occupation </button></li>&nbsp;&nbsp;
                                 </ol>
                              </div><!-- /.col -->
                        </div><!-- /.row -->
                     </div>
       
                  </div>
                </div>
                @include('artist::common.modal')    
                
                <div class="iq-card-body col-md-12">
                   <div class="table-view">
                      <table class=" table table-bordered table-sm " style="width:100%;text-align:center">
                           
                        <thead width="100%">
                            <tr>
                                <th width="30%">Sl</th>
                                <th width="50%" >Title</th>
                                <th width="20%" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($occupations as $key => $occupation)  
                        <tr>
                            <td>#{{$key + 1}}</td>
                            <td >{{$occupation->title}}</td>
                            <td>
                            <a href="#" class="edit"  title="Edit" data-bs-toggle="modal" data-bs-target="#OccupationEdit"><i class="ri-pencil-line"></i></a>
                            @include('artist::common.occupation-edit-modal')             
                            <a class="iq-bg-primary delete-confirm" data-bs-toggle="modal" data-bs-target="#OccupationList" data-placement="top" title=""
                                            data-original-title="Delete" href="{{route('admin.artist.occupation-destroy',$occupation->id)}}"><i
                                            class="ri-delete-bin-line delete-confirm"></i>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                      </table>
                      <div class="d-felx justify-content-center ">
                       {{ $occupations->links() }}
               </div>
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