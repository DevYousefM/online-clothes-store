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
                    <form id="register" method="POST" action="{{ route('store.register') }}">
                        @csrf
                        <div class="row d-flex flex-col">
                            <div class="col-lg-6 pt-1">
                                @error('f_name')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <fieldset>
                                    <input value="{{ old('f_name') }}" name="f_name" type="text" placeholder="Nome">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 pt-1">
                                @error('l_name')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <fieldset>
                                    <input value="{{ old('l_name') }}" name="l_name" type="text"
                                        placeholder="Cognome">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 pt-1">
                                @error('email')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <fieldset>
                                    <input value="{{ old('email') }}" name="email" type="email"
                                        placeholder="La tua email">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 pt-1">
                                @error('password')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <fieldset>
                                    <input value="{{ old('password') }}" name="password" type="password"
                                        placeholder="La tua password">
                                </fieldset>
                            </div>
                            <div class="d-flex justify-content-center w-100 custom-label">
                                @error('user_type')
                                    <label style="color: red">{{ $message }}</label>
                                @enderror
                                <p>Registrati come:</p>
                                <input type="radio" id="user" name="user_type" value="user">
                                <label>Account personale</label><br>
                                <input type="radio" id="company" name="user_type" value="company">
                                <label for="css">Account aziendale</label><br>
                            </div>
                            {{-- Company --}}
                            <div class="w-100 flex-wrap justify-content-center" style="display: none" id="company_info">
                                <div class="col-lg-6 pt-1">
                                    @error('company_name')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('company_name') }}" name="company_name" type="text"
                                            placeholder="Il nome della tua azienda">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('fiscal_id')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('fiscal_id') }}" name="fiscal_id" type="text"
                                            placeholder="Codice fiscale">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('vat_code')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('vat_code') }}" name="vat_code" type="text"
                                            placeholder="Partita IVA">
                                    </fieldset>
                                </div>

                                {{-- <div class="col-lg-6 pt-1">
                                    @error('tax_code')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('tax_code') }}" name="tax_code" type="text"
                                            placeholder="Tax Code">
                                    </fieldset>
                                </div> --}}

                                <div class="col-lg-6 pt-1">
                                    @error('pec_code')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('pec_code') }}" name="pec_code" type="text"
                                            placeholder="PEC">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 pt-1">
                                    @error('ben_code')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('ben_code') }}" name="ben_code" type="text"
                                            placeholder="Codice Univoco">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 pt-1">
                                    @error('postal_code')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <fieldset>
                                        <input value="{{ old('postal_code') }}" name="postal_code" type="text"
                                            placeholder="CAP">
                                    </fieldset>
                                </div>


                                


                            </div>
                            {{-- Company --}}
                            <div class="col-lg-12 pt-3">
                                <fieldset class="d-flex justify-content-center">
                                    <button type="submit" class="main-dark-button"
                                        style="width: 50%">Registrati</button>
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
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/getDists.js') }}"></script>

</body>

</html>
