@extends('layouts.app')
@section('content')
    <x-content>
        @slot('title') Product @endslot
        @slot('subTitle') Cart @endslot
        @slot('body')
            <div class="row">
                <x-card large="12">
                    @slot('title') Cart @endslot
                    @slot('body')
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Product Desc</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
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
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form action="{{ route('cart.destroy', ['cart' => $cart->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="mdi mdi-trash-can font-size-18"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{route('cart.show',$cart->id)}}"><button class="btn btn-warning" type="button"><i class="mdi mdi-cart font-size-18"></i></button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endslot
                </x-card>
            </div>
        @endslot
    </x-content>
@endsection
