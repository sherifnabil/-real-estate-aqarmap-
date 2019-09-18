

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/profile/img/favicon.png" type="image/png">
        <title>{{ $title }}</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/profile/css/bootstrap.css">
        <link rel="stylesheet" href="/profile/vendors/linericon/style.css">
        <link rel="stylesheet" href="/profile/css/font-awesome.min.css">
        <link rel="stylesheet" href="/profile/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/profile/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="/profile/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/profile/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="/profile/vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="/profile/vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="/profile/css/style.css">
        <link rel="stylesheet" href="/profile/css/responsive.css">


        <link rel="stylesheet" href="/front-end2/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="/front-end2/css/style.css" type="text/css">

</head>

<body>
{{-- @include('front-end2.layouts.header') --}}
        
    {{-- @push('css') --}}



    {{-- @endpush --}}
@include('front-end2.layouts.nav')

    <!--================Home Banner Area =================-->
    <section style="30px" class="home_banner_area">
        <div class="container box_1620" style="width:1400px">
            <div class="banner_inner d-flex align-items-center">
                <div class="banner_content">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ $user->profilImage() }}" style="width:668px;height:690px" alt="">
                        </div>
                        <div class="media-body">

                            @can ('update', $user)
                                <div class="" style="position: absolute;top: 15px;right: 20px;">
                                    <a href="{{ route('profile.edit', $user) }}" class="btn btn-warning"><i class="fa fa-edit"></i> {{ __('custom.edit_profile') }}</a>
                                </div>
                            @endcan

                            <div class="personal_text">
                                <h6>@lang('custom.hello_everybody_i_am') </h6>
                                <h4 style="font-size:25px">{{ $user->fullName() }}</h4>
                                <h4>{{ ucwords($user->user_type) }}</h4>
                            
                                <ul class="list basic_info">
                                    <li><a href=""><i class="lnr lnr-calendar-full"></i>@lang('custom.member_since') {{ $user->created_at->format('D M Y') }}</a></li>
                                    <li><a href=""><i class="lnr lnr-phone-handset"></i> {{ $user->phone }}</a></li>
                                    <li><a href=""><i class="lnr lnr-envelope"></i> {{ $user->email }}</a></li>
                                    <li><a href=""><i class="lnr lnr-home"></i> {{ $user->fullAddress() }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <br><br>
    <section style="30px" class="home_gallery_area " >
        <div class="container">
            <div class="main_title">
                <h2 class="h2" >@lang('custom.my_latest_projects')</h2>
            </div>
        </div>
        <div class="container">
            <div class="gallery_f_inner row imageGallery1" style="position: relative; height: 930px;">
                @foreach ($recent_properties as $item)
                    
                    <div class="col-lg-4 col-md-4 col-sm-6 brand creative print"
                        {{-- style="position: absolute; left: 0px; top: 465px;" --}}
                        >
                        <div class="">
                            <div class="g_img_item">
                                <img class="img-fluid" src="{{ $item->featured() }}" alt="">
                                <a class="light" href="img/gallery/project-4.jpg"><img src="/profile/img/gallery/icon.png"
                                        alt=""></a>
                            </div>
                            <div class="g_item_text">
                            <h4> <a class="h4" href="{{ route('properties.view', $item) }}">{{ ucwords($item->name) }}</a></h4>
                                <p><a style="text-decoration: none; color:#222" href="{{ route('categories.view', $item->category) }}">{{ ucwords($item->category->name) }}</a></p>
                            </div>
                        </div>
                    </div>

                    
        
                @endforeach  
            </div>

        </div>
    </section>
    <br><br><br> <br>
    <section style="30px" class="home_gallery_area ">
        <div class="container">
            <div class="main_title">
                <h2 class="h2">@lang('custom.all_projects')</h2>
            </div>

        </div>
        <div class="container">
            <div class="gallery_f_inner row imageGallery1" style="position: relative; height: 930px;">
                @foreach ($properties as $item)

                <div class="col-lg-4 col-md-4 col-sm-6 brand creative print"
                    {{-- style="position: absolute; left: 0px; top: 465px;" --}}>
                    <div class="">
                        <div class="g_img_item">
                            <img class="img-fluid" src="{{ $item->featured() }}" alt="">
                            <a class="light" href="img/gallery/project-4.jpg"><img src="/profile/img/gallery/icon.png"
                                    alt=""></a>
                        </div>
                        <div class="g_item_text">
                            <h4> <a class="h4" href="{{ route('properties.view', $item) }}">{{ ucwords($item->name) }}</a></h4>
                            <p><a style="text-decoration: none; color:#222" href="{{ route('categories.view', $item->category) }}">{{ ucwords($item->category->name) }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>
    <br><br><br>    <br>


    @if (auth()->id() == $user->id)
        
        <section style="30px" class="home_gallery_area ">
            <div class="container">
                <div class="main_title">
                    <h2 class="h2">@lang('custom.pending_projects')</h2>
                </div>

            </div>
            <div class="container">
                <div class="gallery_f_inner row imageGallery1" style="position: relative; height: 930px;">
                    @foreach ($pending_properties as $item)

                    <div class="col-lg-4 col-md-4 col-sm-6 brand creative print"
                        {{-- style="position: absolute; left: 0px; top: 465px;" --}}>
                        <div class="">
                            <div class="g_img_item">
                                <img class="img-fluid" src="{{ $item->featured() }}" alt="">
                                <a class="light" href="img/gallery/project-4.jpg"><img src="/profile/img/gallery/icon.png"
                                        alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4> <a class="h4" href="{{ route('properties.view', $item) }}">{{ ucwords($item->name) }}</a></h4>
                                <p><a style="text-decoration: none; color:#222" href="{{ route('categories.view', $item->category) }}">{{ ucwords($item->category->name) }}</a>
                                </p>
                            </div>
                        </div>
                    </div>



                    @endforeach
                </div>

            </div>
        </section>

    <br><br><br>    <br>
    @endif
    
    @push('js')
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/profile/js/jquery-3.3.1.min.js"></script>
        <script src="/profile/js/popper.js"></script>
        <script src="/profile/js/bootstrap.min.js"></script>
        <script src="/profile/js/stellar.js"></script>
        <script src="/profile/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/profile/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="/profile/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="/profile/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="/profile/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/profile/vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="/profile/js/jquery.ajaxchimp.min.js"></script>
        <script src="/profile/vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="/profile/vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="/profile/js/mail-script.js"></script>
        <script src="/profile/js/theme.js"></script>
{{-- 


        <script src="/front-end2/js/jquery-3.3.1.min.js"></script>
        <script src="/front-end2/js/jquery.nice-select.min.js"></script>
        <script src="/front-end2/js/owl.carousel.min.js"></script>
        {{-- <script src="/front-end2/js/jquery-ui.min.js"></script> --}}
        <script src="/front-end2/js/jquery.slicknav.js"></script>
        <script src="/front-end2/js/bootstrap.min.js"></script> --}}
        {{-- <script src="/front-end2/js/main.js"></script> --}}
    @endpush

@include('front-end2.layouts.footer')

</body>

</html>