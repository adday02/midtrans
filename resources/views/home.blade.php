@extends('layouts.app')

{{-- @section('content')
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="product-img position-relative">
                        <div class="avatar-sm product-ribbon">
                            <span class="avatar-title rounded-circle  bg-primary">
                                - 25 %
                            </span>
                        </div>
                        <img src="assets/images/product/img-1.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Half sleeve T-shirt </a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$500</del></span>
                            <b>$450</b></h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="product-img position-relative">
                        <img src="assets/images/product/img-2.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Light blue T-shirt</a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$240</del></span>
                            <b>$225</b></h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="product-img position-relative">
                        <div class="avatar-sm product-ribbon">
                            <span class="avatar-title rounded-circle  bg-primary">
                                - 20 %
                            </span>
                        </div>
                        <img src="assets/images/product/img-3.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Black Color T-shirt</a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$175</del></span>
                            <b>$152</b></h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="product-img position-relative">
                        <img src="assets/images/product/img-4.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Hoodie (Blue)</a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$150</del></span>
                            <b>$145</b></h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">

                    <div class="product-img position-relative">
                        <div class="avatar-sm product-ribbon">
                            <span class="avatar-title rounded-circle  bg-primary">
                                - 22 %
                            </span>
                        </div>
                        <img src="assets/images/product/img-5.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Half sleeve T-Shirt</a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$145</del></span>
                            <b>$138</b></h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="product-img position-relative">
                        <div class="avatar-sm product-ribbon">
                            <span class="avatar-title rounded-circle bg-primary">
                                - 28 %
                            </span>
                        </div>
                        <img src="assets/images/product/img-6.png" alt=""
                            class="img-fluid mx-auto d-block">
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                class="text-dark">Green color T-shirt</a></h5>

                        <p class="text-muted">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star"></i>
                        </p>
                        <h5 class="my-0"><span class="text-muted me-2"><del>$138</del></span>
                            <b>$135</b></h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@section('content')
    <x-content>
        @slot('title') Product @endslot
        @slot('subTitle') Product @endslot
        @slot('body')
            <div class="row">
                <x-card large="12">
                    @slot('title') Product @endslot
                    @slot('body')
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="product-img position-relative">
                                                <div class="avatar-sm product-ribbon">
                                                    @if($product->discount)
                                                        <span class="avatar-title rounded-circle  bg-primary">
                                                            - {{$product->discount}} %
                                                        </span>
                                                    @endif
                                                </div>
                                                <img src="{{asset('product/'.$product->image)}}" alt="" class="img-fluid mx-auto d-block">

                                            </div>
                                            <div class="mt-4 text-center">
                                                <h5 class="mb-3 text-truncate"><a href="javascript: void(0);" class="text-dark">{{$product->name}} </a></h5>
                                                @if($product->discount)
                                                    <h5 class="my-0">
                                                        <span class="text-muted me-2">
                                                            <del>Rp. {{ number_format($product->price) }}</del>
                                                        </span>
                                                        <b>Rp. {{ number_format($product->price - ($product->price * $product->discount / 100)) }}</b>
                                                    </h5>                                           
                                                @else
                                                    <h5 class="my-0"><b>Rp. {{number_format($product->price)}}</b></h5>
                                                @endif
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="{{route('cart.store')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <input type="hidden" name="price" value="{{$product->price_discount}}">
                                                            <button class="btn btn-warning"><i class="bx bx-cart"></i> Cart</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-info"><i class="bx bx-detail"></i> Detail</button> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endslot
                </x-card>
            </div>
        @endslot
    </x-content>
@endsection
