<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href={{ url('/') }}>Home</a></li>
                        <li class="scroll-to-section"><a href="/#men">Men</a></li>
                        <li class="scroll-to-section"><a href="/#wom">Women</a></li>
                        <li class="scroll-to-section"><a href="/#kid">Kids</a></li>
                        <li class="scroll-to-section"><a href="/#acce">Accessories</a></li>
                        <li class="submenu">
                            <a>Pages</a>
                            <ul>
                                <li><a>About</a></li>
                                <li><a>Contact Us</a></li>
                                <li><a>Termsc</a></li>
                            </ul>
                        </li>
                        <li class="scroll-to-section text-black">
                            <a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="submenu custom">
                            <a><i class="fa fa-user"></i></a>
                            @if (isset(Auth::user()->name))
                                <ul>
                                    <li>
                                        <form class="main-border-button" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link style="padding-top: 0 !important" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <ul>
                                    <li>
                                        <div class="main-border-button">
                                            <a style="padding-top: 0 !important" href={{ route('loginpage') }}>Login</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="main-border-button">
                                            <a
                                                style="padding-top: 0 !important"href={{ route('register') }}>Registrazione</a>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </li>



                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
