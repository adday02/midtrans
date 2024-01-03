 <!-- JAVASCRIPT -->
 <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
 <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

 <!-- Ion Range Slider-->
 <script src="{{asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

 <!-- init js -->
 <script src="{{asset('assets/js/pages/product-filter-range.init.js')}}"></script>

 <!-- App js -->
 <script src="{{asset('assets/js/app.js')}}"></script>
 
 <!-- Midtrans Js -->
 <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
 
 <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });
</script>
 @stack('js')