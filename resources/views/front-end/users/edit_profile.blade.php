<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/profile/img/favicon.png" type="image/png">
    <title>MeetMe Personal</title>
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
<section class="home_gallery_area p_120">

    <div class="container">
        {{-- <div class="gallery_f_inner row imageGallery1" style="position: relative; height: 930px;"> --}}
            @include('front-end._message')
            <form action="{{ route('profile.update', $row) }}" method="POST" role="form" enctype="multipart/form-data">
            
                @csrf
                @method('POST')
                <div class="box-body">
                    <div class="form-group">
                        <label>{{ __('custom.first_name') }}: </label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" value="{{ $row->first_name }}" required autocomplete="first_name" autofocus>
                    </div>
            
                    <div class="form-group">
                        <label>{{ __('custom.last_name') }}: </label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" value="{{ $row->last_name }}" required autocomplete="last_name">
                    </div>
            
            
                    <div class="form-group">
                        <label>{{ __('custom.email') }}: </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $row->email }}" required autocomplete="email">
            
                    </div>
            
            
                    <div class="form-group">
                        <label>@lang('custom.profile_image')</label>
                        <input type="file" name="profile_image" class="form-control image">
                    </div>
                    <div class="form-group">
                        <img src="{{ $row->profilImage() }}" class="img-thumbnail image-preview" alt=""
                            style="width:250px; height:200px">
                    </div>
            
            
            
                    <div class="form-group ">
            
                        <label>{{ __('custom.password') }}: </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
            
                    </div>
            
                    <div class="form-group ">
            
                        <label>{{ __('custom.password_confirmation') }}: </label>
                        <input id="password_confirmation" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
            
                    </div>
            
                    <div class="form-group ">
                        <label>{{ __('custom.phone') }}: </label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{ $row->phone }}" required autocomplete="phone">
            
            
                    </div>
            
                    <div class="form-group ">
                        <label>{{ __('custom.address') }}: </label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            value="{{ $row->address }}" required autocomplete="address">
            
                    </div>
            
            
                    <div class="form-group ">
                        <label>{{ __('custom.city') }}: </label>
            
            
                        <select name="city_id" id="city" class="form-control">
                            <option></option>
                            @foreach ($cities as $city)
                                <option {{ $row->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}"> {{ $city->name }}</option>
                            @endforeach
                        </select>
            
                    </div>
            
                    <div id="statesContainer"></div>
            
           <br><br> 
            
                <div>
                    <button type="submit"
                        class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">{{ $title }}</button>
                </div>
            </div>
            <!-- /.box-body -->
            
        </form>
    </div>
            

        </div>

    </div>
</section>


@push('js')
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/profile/js/jquery-3.3.1.min.js"></script>
<script src="/profile/js/popper.js"></script>
<script src="/profile/js/bootstrap.min.js"></script>
<script src="/profile/js/stellar.js"></script>
<script src="/profile/vendors/lightbox/simpleLightbox.min.js"></script>
{{-- <script src="/profile/vendors/nice-select/js/jquery.nice-select.min.js"></script> --}}
<script src="/profile/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="/profile/vendors/isotope/isotope.pkgd.min.js"></script>
<script src="/profile/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/profile/vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="/profile/js/jquery.ajaxchimp.min.js"></script>
<script src="/profile/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="/profile/vendors/counter-up/jquery.counterup.min.js"></script>
<script src="/profile/js/mail-script.js"></script>
<script src="/profile/js/theme.js"></script>

<script src="/noty/noty.min.js">
</script>

<script>
    $(".image").change(function () {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });
                    
</script>


    @if ($row->city_id)
        <script>
            $(document).ready(function () {
                // console.log("qwd");
                
                $("select[name=city_id]").val("{{ $row->city_id }}").trigger("change");
            })
        </script>
    @endif
    @endpush
    
    @include('front-end2.layouts.footer')
    @include('custom-auth.ajax')
    
    </body>

</html>