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
    <style>
        .checkoutLink {
            width: 44px;
            height: 44px;
            display: inline-block;
            text-align: center;
            line-height: 44px;
            background-color: #2a2a2a;
            box-shadow: none;
            border: 1px solid transparent;
            color: #fff;
            transition: all 0.3s;
        }

        .checkoutLink:hover {
            background-color: #fff;
            border: 1px solid #2a2a2a;
            color: #2a2a2a;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    @include('home.preload')
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('home.header')
    <!-- ***** Header Area End ***** -->

    @if (session('result'))
        <div id="result" class="alert fixed-top alert-warning alert-dismissible fade show" role="alert">
            {{ session('result') }}
        </div>
    @endif

    <!-- ***** About Area Starts ***** -->
    <div class="about-us pt-5">
        <div class="container">
            <?php $total = 0; ?>
            @isset($cart)

                @if (count($cart) > 0)
                    @foreach ($cart as $cart)
                        <form class="row py-3 position-relative" action="{{ route('update_cart') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cart->id }}">
                            <a href="{{ url('del_cart', $cart->id) }}" style="z-index:1" class="position-absolute">
                                <button type="button" class="btn btn-danger">
                                    X
                                </button>
                            </a>
                            <div class="col-lg-6">
                                <div class="left-image d-flex justify-content-center">
                                    <img class="w-auto" src="{{ asset('app/' . $cart->product_img) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-content">
                                    <h5>{{ $cart->product_title }}</h5>
                                    <div class="price d-flex" style="flex-direction: row">
                                        <span style="font-size: 28px">
                                            $
                                        </span>
                                        <span id="price" style="font-size: 28px">
                                            {{ $cart->product_price - ($cart->product_price * $cart->product_percent) / 100 }}
                                        </span>
                                    </div>
                                    <span>{{ $cart->product_description }}</span>
                                    <div style="margin: 0;padding:20px"
                                        class="quantity-content d-flex flex-row justify-content-around">
                                        <div class="quantity buttons_added">
                                            <input type="number" step="1" min="1" max=""
                                                name="quantity" id="qtn" value="{{ $cart->quantity }}" title="Qty"
                                                class="input-text qty text" size="4">
                                        </div>
                                        <div class="main-border-button">
                                            <button class="custom-button" type="submit">
                                                Update Quantity
                                            </button>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <h4 style="font-size: 30px;text-align:center;font-weight:500;float:none">
                                            Total:
                                            ${{ $cart->quantity * $cart->product_price - ($cart->quantity * $cart->product_price * $cart->product_percent) / 100 }}
                                            <?php $total += $cart->quantity * $cart->product_price - ($cart->quantity * $cart->product_price * $cart->product_percent) / 100; ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach


                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ route('make_order.user') }}" class="col-6">
                            <button type="submit" class="checkoutLink main-dark-button" style="width: 100%"
                                id="form-submit">Checkout Now</button>
                        </a>
                    </div>
                @else
                    <h3 class="pt-3 " style="color: red;text-align:center">Your shopping cart is empty</h3>
                @endif
            @endisset

        </div>
    </div>
    <!-- ***** About Area Ends ***** -->
    <!-- ***** Footer Start ***** -->
    @include('home.footer')


    {{-- Script --}}
    @include('home.script')
    <script>
        if (document.getElementById("result")) {
            let result = document.getElementById("result");
            setTimeout(() => {
                result.remove();
            }, 4000);
        }
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
