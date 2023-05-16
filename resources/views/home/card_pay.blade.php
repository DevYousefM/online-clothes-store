<form role="form" id="contact" action="{{ route('make_order', $product_id) }}" class="form require-validation"
    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="POST">
    @csrf
    @method('POST')
    <div class="row d-flex flex-col">
        <input type="hidden" name="qtn" value="{{ $quantity }}">
        <div class="col-lg-6 pt-1">
            @error('f_name')
                <label style="color: red">{{ $message }}</label>
            @enderror
            <fieldset>
                <input value="{{ old('f_name') }}" name="f_name" type="text" id="name"
                    placeholder="Your First Name" required="">
            </fieldset>
        </div>

        <div class="col-lg-6 pt-1">
            @error('l_name')
                <label style="color: red">{{ $message }}</label>
            @enderror
            <fieldset>
                <input value="{{ old('l_name') }}" name="l_name" type="text" id="name"
                    placeholder="Your Last Name" required="">
            </fieldset>
        </div>

        <div class="col-lg-6 pt-1">
            @error('email')
                <label style="color: red">{{ $message }}</label>
            @enderror
            <fieldset>
                <input value="{{ old('email') }}" name="email" type="email" id="name" placeholder="Your Email"
                    required>
            </fieldset>
        </div>

        <div class="col-lg-6 pt-1">
            <fieldset>
                <input name="number" type="tel" id="number" placeholder="Your Phone Number" required>
            </fieldset>
        </div>

        <div class="col-lg-6 pt-1">
            <fieldset>
                @if (session('region'))
                    <label style="color: red">{{ session('region') }}</label>
                @endif
                <select name="region" id="region">
                    <option>Seleziona la regione...</option>
                    @foreach ($regions as $item)
                        <option>{{ $item }}</option>
                    @endforeach
                </select>
            </fieldset>
        </div>

        <div class="col-lg-6 pt-1" id="dist">
            @if (session('district'))
                <label style="color: red">{{ session('district') }}</label>
            @endif
            <fieldset>
                <select name="district" id="ditricts">
                    <option>Seleziona la città...</option>
                </select>
            </fieldset>
        </div>


        {{-- Credit Card --}}
        <div class="w-100 flex-wrap justify-content-center" style="display: none" id="payment">
            <div class="col-lg-6 pt-1">
                @error('address')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input value="{{ old('address') }}" name="address" type="text" id="name"
                        placeholder="Delivery Address">
                </fieldset>
            </div>
            <div class="col-lg-6 pt-1">
                @error('name_on_card')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input value="{{ old('name_on_card') }}" name="name_on_card" type="text" id="name"
                        placeholder="Your Name On Card">
                </fieldset>
            </div>

            <div class="col-lg-6 pt-1">
                @error('card_number')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input value="{{ old('card_number') }}" class="card-number" name="card_number" type="text"
                        id="name" placeholder="Card Number">
                </fieldset>
            </div>

            <div class="col-lg-6 pt-1">
                @error('cvc')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input class="card-cvc" value="{{ old('cvc') }}" name="cvc" type="text" id="name"
                        placeholder="CVC">
                </fieldset>
            </div>

            <div class="col-lg-6 pt-1">
                @error('ex_month')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input class="card-expiry-month" value="{{ old('ex_month') }}" name="ex_month" type="text"
                        id="name" placeholder="MM" size="2">
                </fieldset>
            </div>
            <div class="col-lg-6 pt-1">
                @error('ex_year')
                    <label style="color: red">{{ $message }}</label>
                @enderror
                <fieldset class="required">
                    <input class="card-expiry-year" value="{{ old('ex_year') }}" name="ex_year" type="text"
                        id="name" placeholder="YYYY" size="4">
                </fieldset>
            </div>

            <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>Please correct the errors and try
                    again.</div>
            </div>

        </div>
        {{-- Credit Card --}}

        <div class="col-lg-12 pt-5">
            <fieldset class="d-flex justify-content-center">
                <button type="submit" class="main-dark-button" style="width: 50%">Complete Order</button>
            </fieldset>
        </div>
    </div>
</form>
