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
            <div class="row">
                <div class="col-md-12">
                    <form id="contact" method="POST" action="{{ route('complete_user_info') }}">
                        @csrf
                        <div class="row d-flex flex-col justify-content-center">

                            <div class="col-lg-8 pt-1">
                                <fieldset>
                                    <input name="number" type="tel" id="number" placeholder="Your phone number"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-8 pt-1">
                                <fieldset>
                                    <input name="vat_code" type="text" id="email" placeholder="VAT Tax"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-8 pt-1">
                                <fieldset>
                                    <input name="postal_code" type="number" id="email" placeholder="Postal Code"
                                        required="">
                                </fieldset>
                            </div>

                            <div class="col-lg-12 pt-5">
                                <fieldset class="d-flex justify-content-center">
                                    <button type="submit" class="main-dark-button" style="width: 50%"
                                        id="form-submit">Done</button>
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
</body>

</html>
