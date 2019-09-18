<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> {{ !empty(settings()->our_contact_number) ? settings()->our_contact_number : __('custom.no_data_provided') }}</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> {{ !empty(settings()->fullAddress()) ? settings()->fullAddress() : __('custom.no_data_provided') }}</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li class="dropdown ">
                        <a href="{{ asset('/') }}#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu" >
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a style="color:#d23420" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li><br>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"><i class="fa fa-user-o"></i>
                            @if (auth()->user())
                                {{ auth()->user()->fullName() }}
                            @else
                                @lang('custom.my_account')
                            @endif
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            @if (auth()->user()) 
                            <a href="{{ route('logout') }}">{{ __('Logout') }}</a> <i class="fa fa-sign-out" aria-hidden="true"></i>
                            
                            @else
                            @lang('custom.register')
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img style="width:170px; height:70px" src="{{ settings()->siteImage() }}">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0"> All Categories </option>
                                    <option value="1"> Category 01</option>
                                    <option value="1"> Category 02</option>
                                </select> 
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            
                            <!-- Cart -->
                            

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->


    <!-- /NAVIGATION -->