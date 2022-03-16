@extends('layouts.app')

@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12"> 
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Create Artist</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{ route('admin.artist.index') }}" class="btn btn-primary">Artist List</a>
                   </div>
                </div>
               <div class="row col-md-12"> 
               <form  method="post"  action="{{route('admin.artist.store')}}" enctype="multipart/form-data"> 
                  @csrf 
                  <div class="row">
                     <div class="iq-card-body col-md-8">
                           <div class="table-view">
                           
                                    <div class="row col-md-12">
                                          <div class="col-md-12">
                                             @input(['input_name' => 'name' , 'additional_class' => 'make-slug']) 
                                          </div> 
                                          <div class="col-md-12">
                                             @input(['input_name'=>'slug' , 'additional_class' => 'slug']) 
                                          </div>
                                          <div class="col-md-12">
                                             @input(['input_name'=>'company','value' => old("company"),'required' => false]) 
                                          </div> 
                                          <div class="col-md-12">
                                             @select(['input_name'=>'gender','required' => false , 'data_set' => ['Male' ,'Female' ,'Others']]) 

                                          </div>
                                          <div class="col-md-12">
                                             @input(['input_name'=>'remarks','value' => old("remarks"),'required' => false]) 
                                          </div> 
                                          <div class="col-md-12 " >
                                             @input(['input_name'=>'dob','value' => old("dob"),'required' => false,'additional_class' => 'datepicker','custom_string' => 'readonly']) 
                                          </div> 
                                          <div>
                                              <button type="submit" class="btn btn-primary btn-sm ml-1">Submit</button>
                                          </div>
                                    </div>
                                 
                                 
                           </div>
                     </div>
                     <div class="iq-card-body col-md-4">
                           <div class="table-view">
                           
                                    <div class="row">
                                       
                                          <div class="col-md-12 mt-4">
                                             @imageWithPreview(['input_name' => 'image'])
                                          </div> 
                                          <div class="col-md-12">
                                             @textarea(['input_name' => 'description' , 'required' => false])
                                          </div>                                    
                                    </div>
                           
                           </div>
                     </div>
                  </div>
               </form>
               </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
 

@endsection
@push('scripts')
<script type="text/javascript">
     $(document).ready(function(e) {
      $(document).on('change','.make-slug', function (e) {
     
      let  slug = $(this).val();
         console.log(slug);
        let route = "{{ route('admin.artist.getslugs') }}";
        let table = 'artists';
        let column = 'slug';
      //   $.ajaxSetup({
      //       headers:
      //       { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      //   });

        $.ajax({
               type: 'GET',
               url: route,
               data: {
                     slug: slug,
                     table: table,
                     column: column
               },
               success: function(data) {

                     $('.slug').val(data.slug);
               }
            });
         });
     
     
      });
 

</script>
<script type="text/javascript">
    $(function(){
      $('.datepicker').click(function(){
         $('.datepicker').datepicker({
         format: "yyyy-mm-dd",
         autoclose: true
         });

      }); 
     
    });
</script>
@endpush