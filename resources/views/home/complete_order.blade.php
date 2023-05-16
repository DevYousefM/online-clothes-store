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

    <div class="contact-us" style="padding-top:100px">
        <div class="container">
            @if (Session::has('fail'))
                <div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('fail') }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('store_order') }}" class="form" method="POST">
                        @csrf
                        <div class="row d-flex flex-col">
                            <div class="col-lg-12 pt-1">
                                @error('address')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <fieldset class="required">
                                    <input value="{{ old('address') }}" name="address" type="text" id="name"
                                        placeholder="Delivery address">
                                </fieldset>
                            </div>

                            {{-- @if (session('payment'))
                                <label style="color: red;width:100%;text-align:center">{{ session('payment') }}</label>
                            @endif
                            <div class="d-flex justify-content-center w-100 custom-label">
                                <p>Payment Method:</p>
                                <input type="radio" id="on_delivary" name="payment_status" value="on_delivary">
                                <label>On Delivary</label><br>
                                <input type="radio" class="credit_card" name="payment_status" value="credit_card">
                                <label>By Credit Card</label><br>
                            </div> --}}
                            {{-- Credit Card --}}
                            {{-- <div class="w-100 flex-wrap justify-content-center" style="display: none" id="payment">
                                <div class="col-lg-6 pt-1">
                                    @error('address')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input value="{{ old('address') }}" name="address" type="text"
                                            id="name" placeholder="Delivery Address">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 pt-1">
                                    @error('name_on_card')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input value="{{ old('name_on_card') }}" name="name_on_card" type="text"
                                            id="name" placeholder="Your Name On Card">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('card_number')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input value="{{ old('card_number') }}" class="card-number" name="card_number"
                                            type="text" id="name" placeholder="Card Number">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('cvc')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input class="card-cvc" value="{{ old('cvc') }}" name="cvc"
                                            type="text" id="name" placeholder="CVC">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('ex_month')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input class="card-expiry-month" value="{{ old('ex_month') }}"
                                            name="ex_month" type="text" id="name" placeholder="MM"
                                            size="2">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 pt-1">
                                    @error('ex_year')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset class="required">
                                        <input class="card-expiry-year" value="{{ old('ex_year') }}" name="ex_year"
                                            type="text" id="name" placeholder="YYYY" size="4">
                                    </fieldset>
                                </div>

                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>

                            </div> --}}
                            {{-- Credit Card --}}

                            <div class="col-lg-12 pt-5">
                                <fieldset class="d-flex justify-content-center">
                                    <button type="submit" class="main-dark-button form-sub" style="width: 50%">Complete Order</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Script --}}
    @include('home.script')
    <script src="{{ asset('assets/js/getDists.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
