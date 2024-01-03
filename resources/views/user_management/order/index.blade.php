@extends('layouts.app')
@section('content')
    <x-content>
        @slot('title') Product @endslot
        @slot('subTitle') Order @endslot
        @slot('body')
            <div class="row">
                <x-card large="12">
                    @slot('title') Order @endslot
                    @slot('body')
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#pending1" role="tab" aria-selected="true">
                                    <span class="d-none d-sm-block">Waiting Payment</span> 
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#settlement1" role="tab" aria-selected="false" tabindex="-1">
                                    <span class="d-none d-sm-block">Settlement</span> 
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#failure1" role="tab" aria-selected="false" tabindex="-1">
                                    <span class="d-none d-sm-block">Failure</span>   
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#other1" role="tab" aria-selected="false" tabindex="-1">
                                    <span class="d-none d-sm-block">Other</span>    
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active show" id="pending1" role="tabpanel">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">Transaction ID</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Product Desc</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->where('status','pending') as $cart)
                                        <tr>
                                            <td class="text-center">#{{$cart->transaction_id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset('product/'.$cart->product->image)}}" alt="product-img" title="product-img" class="avatar-md">
                                            </td>
                                            <td class="text-center">
                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$cart->product->name}}</a></h5>
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->product->price_discount)}}
                                            </td>
                                            <td class="text-center">
                                                {{$cart->amount}}
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->total)}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1" onclick="paynow({{$cart->id}},'{{$cart->snap_token}}')">
                                                    <i class="bx bx-cart me-2"></i> Pay Now
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="settlement1" role="tabpanel">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">Transaction ID</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Product Desc</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->where('status','settlement') as $cart)
                                        <tr>
                                            <td class="text-center">#{{$cart->transaction_id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset('product/'.$cart->product->image)}}" alt="product-img" title="product-img" class="avatar-md">
                                            </td>
                                            <td class="text-center">
                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$cart->product->name}}</a></h5>
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->product->price_discount)}}
                                            </td>
                                            <td class="text-center">
                                                {{$cart->amount}}
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->total)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="failure1" role="tabpanel">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">Transaction ID</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Product Desc</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->where('status','failure') as $cart)
                                        <tr>
                                            <td class="text-center">#{{$cart->transaction_id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset('product/'.$cart->product->image)}}" alt="product-img" title="product-img" class="avatar-md">
                                            </td>
                                            <td class="text-center">
                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$cart->product->name}}</a></h5>
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->product->price_discount)}}
                                            </td>
                                            <td class="text-center">
                                                {{$cart->amount}}
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->total)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="other1" role="tabpanel">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">Transaction ID</th>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Product Desc</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts->where('status','!=','pending')->where('status','!=','settlement')->where('status','!=','failure') as $cart)
                                        <tr>
                                            <td class="text-center">#{{$cart->transaction_id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset('product/'.$cart->product->image)}}" alt="product-img" title="product-img" class="avatar-md">
                                            </td>
                                            <td class="text-center">
                                                <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">{{$cart->product->name}}</a></h5>
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->product->price_discount)}}
                                            </td>
                                            <td class="text-center">
                                                {{$cart->amount}}
                                            </td>
                                            <td class="text-center">
                                                Rp. {{number_format($cart->total)}}
                                            </td>
                                            <td class="text-center">{{$cart->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    @endslot
                </x-card>
            </div>
        @endslot
    </x-content>
@endsection

@push('js')
    <script>
        function paynow(id,snap_token){
            snap.pay(snap_token, {
            enabledPayments: ["bca_va", "bni_va","bri_va","mandiri_va","permata_va","cimb_va","echannel"],
          // Optional
            onSuccess: function(result){
                $.ajax({
                    url: "{{route('order.store')}}",
                    method: 'POST',
                    data: {
                        id:id,
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
                        id:id,
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
                        id:id,
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
        }
    </script>
@endpush