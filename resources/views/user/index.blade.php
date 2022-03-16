@extends('layouts.app')

@section('content')

  <!-- Page Content  -->
  <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">User Lists</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-view">
                              <table class="data-tables table movie_table" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th>SL No.</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Join Date</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   @forelse ($users as $user)
                                    <tr>
                                       <td>{{ $loop->index +1 }}</td>
                                       <td>{{ $user->name }}</td>
                                       <td>{{ $user->email }}</td>
                                       <td>{{ $user->created_at }}</td>
                                       <td>
                                          <div class="flex align-items-center list-user-action">
                                             <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i
                                                class="ri-pencil-line"></i></a>
                                                <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i
                                                   class="ri-delete-bin-line"></i></a>
                                                </div>
                                             </td>
                                      </tr>
                                    @empty

                                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Role Lists</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="table-view">
                     <table class="data-tables table movie_table" style="width:100%">
                        <thead>
                           <tr>
                              <th>SL No.</th>
                              <th>Name</th>
                              <th>Gurd Name</th>
                              <th>Join Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                          @forelse ($roles as $role)
                           <tr>
                              <td>{{ $loop->index +1 }}</td>
                              <td>{{ $role->name }}</td>
                              <td>{{ $role->guard_name }}</td>
                              <td>{{ $role->created_at }}</td>
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i
                                       class="ri-pencil-line"></i></a>
                                       <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i
                                          class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                             </tr>
                           @empty

                           @endforelse
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
    </div>
  </div>
                                          <!-- Wrapper END -->
@endsection
