@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Tag Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{ route('admin.tag.add') }}" class="btn btn-primary">Add Tag</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-view">
                      <table class="data-tables table movie_table " style="width:100%">
                         <thead>
                            <tr>
                               <th style="width:10%;">No</th>
                               <th style="width:20%;">Title (English)</th>
                               <th style="width:20%;">Title (Bangla)</th>
                               <th style="width:20%;">Title (Hindi)</th>
                               <th style="width:20%;">Slug</th>
                               <th style="width:20%;">Status </th>
                              
                               <th style="width:20%;">Action</th>
                            </tr>
                         </thead>
                         <tbody>                          
                         
                          @foreach ($mdata as $item)
                          
                           <tr>
                              <td>#{{$loop->index+1}}</td>
                              <td>{{$item->title_bn}}</td>
                              <td>{{$item->title_en}}</td>
                              <td>{{$item->title_hn}}</td>
                              <td>{{$item->slug}}</td>
                              <td>{{$item->is_active}}</td>
                              
                              <td>
                                 <div class="flex align-items-center list-user-action">
                                    <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="View" href="#"><i class="lar la-eye"></i></a>
                                    <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="{{url('admin/tag')}}/edit/{{$item->id}}"><i class="ri-pencil-line"></i></a>
                                    
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="{{url('admin/tag')}}/delete/{{$item->id}}"><i
                                          class="ri-delete-bin-line"></i></a>
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
@endpush