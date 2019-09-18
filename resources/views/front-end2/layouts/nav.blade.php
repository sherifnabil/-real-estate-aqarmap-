<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Header Section Begin -->
<header class="header-section">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style=" background-color:rgb(52, 51, 105, .2)!important;">
        <div class="logo">
            <a href="{{ url('/') }}">
                <h2 class="h2" style="color:#fff">
        
                    <img src="/front-end2/img/only-logo.png" style="max-width:100px;max-height:30px">
                    {{ strtoupper(settings()->site_name) }}
                </h2>
            </a>
        </div>
        <div class="col-md-6"></div>
        <div class="main-menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto pull-right">
                    @if (!auth()->user())
                        <li class="nav-item active">
                            <a style="color:#FFF" class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                    <li class="nav-item active">
                        <a style="color:#FFF" class="nav-link" href="{{ route('aboutus.view') }}">{{ __('custom.about_us') }} <span class="sr-only">(current)</span></a>
                    </li>
                    @if (auth()->user())
                        <li class="nav-item dropdown">
                            <a style="color:#FFF"class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->fullName() }}
                            </a>
                            <div class="dropdown-menu" style=" background-color:#45467b!important;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('add.property') }}">{{ __('custom.add_property') }}</a>                                <a class="dropdown-item" href="{{ route('home') }}">{{ __('custom.home') }}</a> 
                                <a class="dropdown-item" href="{{ route('users.profile', auth()->user()) }}">{{ __('custom.profile') }}</a> 
                                <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                    @csrf    
                                    <input type="submit" style="background-color: #45467b;color: #fff;border: none;padding-left: 17px;" value="{{ __('custom.logout') }}" > 
                                </form>
                            </div>
                        </li>
                    @else
                        <li>
                            <a class="nav-item" href="{{ route('login') }}"> {{ __('custom.login') }} </a>
                        </li>
                        <li>
                            <a class="nav-item" href="{{ route('register') }}"> {{ __('custom.register') }} </a>
                        </li>
                    @endif
    
                </ul>
    
            </div>
        </div>
    </nav>
</header>
<!-- Header Section End -->
<!-- Hero Section Begin -->
<section class="hero-section home-page set-bg" data-setbg="/front-end2/img/bg.jpg">
    <div class="container hero-text text-white">
    </div>
</section>
<!-- Hero Section End -->