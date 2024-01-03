@extends('layouts.app')
@section('content')
    <x-content>
        @slot('title') Cart @endslot
        @slot('subTitle') Cart Detail @endslot
        @slot('body')
            <div class="row">
                <x-card large="12">
                    @slot('title') Cart Detail @endslot
                    @slot('body')
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-9 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                                <div>
                                                    <img src="{{asset('product/'.$cart->product->image)}}" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1" id="pay-button">
                                                <i class="bx bx-cart me-2"></i> Pay Now
                                            </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3">
                                <h4 class="mt-1 mb-3">{{$cart->product->name}}</h4>
                                <h6 class="text-success text-uppercase">{{$cart->product->discount}} % Off</h6>
                                <h5 class="mb-4">Price : <span class="text-muted me-2"><del>Rp. {{number_format($cart->product->price)}}</del></span> <b>Rp. {{number_format($cart->product->price_discount)}}</b></h5>
                                <p class="text-muted mb-4">To achieve this, it would be necessary to have uniform grammar pronunciation and more common words If several languages coalesce</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="bx bx-cart font-size-16 align-middle text-primary me-1"></i> {{$cart->amount}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="bx bx-money font-size-16 align-middle text-primary me-1"></i> {{number_format($cart->total)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endslot
                </x-card>
            </div>
        @endslot
    </x-content>
@endsection
@push('js')
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$cart->snap_token?>', {
            enabledPayments: ["bca_va", "bni_va","bri_va","mandiri_va","permata_va","cimb_va","echannel"],
          // Optional
            onSuccess: function(result){
                $.ajax({
                    url: "{{route('order.store')}}",
                    method: 'POST',
                    data: {
                        id:"{{$cart->id}}",
                        transaction_id: result.transaction_id,
                    },
                    success: function(response){
                        window.location.href = "{{ route('order.index') }}";
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                });
            },
            // Optional
            onPending: function(result){
                $.ajax({
                    url: "{{route('order.store')}}",
                    method: 'POST',
                    data: {
                        id:"{{$cart->id}}",
                        transaction_id: result.transaction_id,
                    },
                    success: function(response){
                        window.location.href = "{{ route('order.index') }}";
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                });          
            },
          // Optional
            onError: function(result){
                $.ajax({
                    url: "{{route('order.store')}}",
                    method: 'POST',
                    data: {
                        id:"{{$cart->id}}",
                        transaction_id: result.transaction_id,
                    },
                    success: function(response){
                        window.location.href = "{{ route('order.index') }}";
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                });
            }
        });
      };
    </script>
@endpush