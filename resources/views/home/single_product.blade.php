<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    @include('home.title')
    {{-- Css --}}
    @include('home.css')
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    @include('home.preload')
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('home.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row pt-5">
                @if (session('result'))
                    <div id="result" class="alert fixed-top alert-warning alert-dismissible fade show"
                        role="alert">
                        {{ session('result') }}
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="left-images">
                        <img src="{{ asset('app/' . $product->product_img) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    @if (Auth::user())
                        <form class="right-content" method="POST" action="{{ route('add_cart') }}">
                        @else
                            <form class="right-content" method="POST" action="{{ route('checkout', $product->id) }}">
                    @endif
                    @csrf
                    @method('GET')
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <h4>{{ $product->title }}</h4>
                    @if ($product->percent > 0)
                        <span
                            style="color: white;background:red;width: fit-content;padding:3px 7px;border-radius:5px">%{{ $product->percent }}</span>
                    @endif
                    <div class="price d-flex align-items-center" style="flex-direction: row">
                        @if ($product->percent > 0)
                            <span style="text-decoration:line-through;">
                                ${{ $product->price }}
                            </span>
                        @endif

                        <span style="margin-left: 5px;text-decoration:none !important;font-size:30px;color:black">
                            $
                        </span>
                        <span id="price" style="text-decoration:none !important;font-size:30px;color:black">
                            {{ $product->price - ($product->price * $product->percent) / 100 }}
                        </span>
                    </div>
                    <span>{{ $product->description }}</span>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>N. di ordini</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus" id="minus"><input type="number"
                                    step="1" min="1" max="" name="quantity" id="qtn"
                                    value="1" title="Qty" class="input-text qty text" size="4"
                                    pattern="" inputmode=""><input type="button" value="+" class="plus"
                                    id="plus">
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <h4>
                            <h4>
                                Totale: $
                            </h4>
                            <h4 id="total">

                            </h4>
                        </h4>
                        <div class="main-border-button">
                            <button class="custom-button" type="submit">
                                @if (Auth::user())
                                    Add To Cart
                                @else
                                    Buy Now
                                @endif
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                @if ($product->product_vid != '')
                    <div class="col-12 pt-5">
                        <video class="col-12" src="{{ asset('app/' . $product->product_vid) }}" controls></video>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include('home.footer')


    {{-- Script --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @include('home.script')

</body>

</html>
