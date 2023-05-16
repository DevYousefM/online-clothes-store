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

    <!-- ***** Products Area Starts ***** -->
    <section class="section pt-5" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our products</h2>
                        <span>Here you can explore all our products</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('single_product', $item->id) }}">
                                                <i class="fa fa-eye"></i></a></li>
                                        @if (Auth::user())
                                            <li><a class="custom-links" href="{{ route('add_to_cart', $item->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <img src="{{ asset('app/' . $item->product_img) }}" alt="">
                            </div>
                            <div class="down-content">
                                <a href="{{ route('single_product', $item->id) }}">
                                    <h4>{{ $item->title }}</h4>
                                </a> <span>${{ $item->price }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include('home.footer')


    {{-- Script --}}
    @include('home.script')

</body>

</html>
