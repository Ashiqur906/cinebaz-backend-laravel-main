<!doctype html>
<html lang="en-US">
<head>
    @include('frontend::layouts.essential.seo',['seo' => isset($seo)? $seo : null])
    @include('frontend::layouts.essential.css')
    @stack('headcss')
    @stack('styles')
</head>

<body>

    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Header -->
    @include('frontend::layouts.essential.header')
    <!-- Header End -->
    @yield('content')
    @include('frontend::layouts.essential.footer')
    @include('frontend::layouts.essential.js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script> 
        function addListing(id){
            $.ajax({
				url: "{{ url('frontend/ajax/listing') }}"+'/'+id,
				success:function(result){
					Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfully Done!',
                        showConfirmButton: false,
                        timer: 1500
                    })
				}
			});
        }
        function addFavorite(id){
            $.ajax({
				url: "{{ url('frontend/ajax/favorite') }}"+'/'+id,
                type: 'get',
				success:function(result){
					Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Successfully Done!',
                        showConfirmButton: false,
                        timer: 1500
                    })
				}
			});
        }
    </script> 
    @stack('scripts')
</body>

</html>
