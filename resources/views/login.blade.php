<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hexashop Ecommerce HTML CSS Template</title>
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
                    <form id="contact" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row d-flex flex-col">

                            <div class="col-lg-6 pt-1">
                                <fieldset>
                                    <input name="email" type="email" id="name" placeholder="La tua email"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 pt-1">
                                <fieldset>
                                    <input name="password" type="password" id="email" placeholder="Modifica password"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 pt-5">
                                <fieldset class="d-flex justify-content-center">
                                    <button type="submit" class="main-dark-button" style="width: 50%"
                                        id="form-submit">Accedi</button>
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
