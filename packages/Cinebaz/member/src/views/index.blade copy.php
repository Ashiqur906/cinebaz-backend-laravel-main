@extends('layouts.app')
@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Member Lists</h4>
                  </div>
                  <div class="iq-card-header-toolbar d-flex align-items-center">
                      <!-- <a href="{{ route('admin.series.add') }}" class="btn btn-primary">Add Tag</a> -->
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="table-view" style="overflow-x:scroll">
                     <table class=" table table-bordered " style="width:100%"  id="member_table">
                        <thead>
                           <tr>
                           <th style="width:10%;"> No </th>
                              <th style="width:30%;"> Image </th>
                              <th style="width:30%;"> Name </th>
                              <th style="width:20%;"> Email </th>
                              <th style="width:20%;"> Phone </th>
                              <th style="width:20%;"> Gender </th>
                              <th style="width:20%;"> Date of join </th>
                              <th style="width:20%;"> Action </th>
                           </tr>
                        </thead>
                        <tbody>                          
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')


    <script>
        $(document).ready(function() {
            $('#member_table').DataTable({
                processing: true,
                serverSide: true,
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-4'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: "{{ route('admin.member.index') }}",
                },
                columns: [
                  {
                     data: 'id',
                     name: 'No'
                  },
                  {
                     data: 'image',
                     name: 'Image'
                  },
                  {
                     data: 'name',
                     name: 'Name'
                  },
                  {
                     data: 'email',
                     name: 'Email'
                  },
                  {
                     data: 'phone',
                     name: 'Phone'
                  },
                  {
                     data: 'gender',
                     name: 'Gender'
                  },
                  {
                     data: 'date_join',
                     name: 'Date of join'
                  },
                  {
                     data: 'action',
                     name: 'Action'
                  },
                   
                ]

            });

        });

    </script>


@endpush
