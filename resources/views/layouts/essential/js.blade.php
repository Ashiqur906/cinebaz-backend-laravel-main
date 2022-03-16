<!-- Footer END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>




<!-- Appear JavaScript -->
<script src="{{ asset('assets/backend/js/jquery.appear.js') }}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('assets/backend/js/countdown.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Counterup JavaScript -->
<script src="{{ asset('assets/backend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.counterup.min.js') }}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('assets/backend/js/wow.min.js') }}"></script>
<!-- Slick JavaScript -->
<script src="{{ asset('assets/backend/js/slick.min.js') }}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{ asset('assets/backend/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{ asset('assets/backend/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('assets/backend/js/smooth-scrollbar.js') }}"></script>
<!-- apex Custom JavaScript -->
<script src="{{ asset('assets/backend/js/apexcharts.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/backend/js/chart-custom.js') }}"></script>
<!-- Custom JavaScript -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="{{ asset('assets/backend/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ asset('assets/backend/js/dev-custom.js') }}"></script>

<script src="{{asset('vendor/artist/assets/js/image-preview.js')}}"></script>
<script src="{{asset('vendor/artist/assets/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

@if(session()->has('success'))
   <script type="text/javascript">
      $(function(){

         $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'})
      });

   </script>
   @endif
    @if(session()->has('error'))
   <script type="text/javascript">
      $(function(){

         $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'})
      });

   </script>
   @endif

