<!-- Footer Section Begin -->
<footer class="footer-section">
    <!-- Rooms Pic Section Begin-->
    <div class="room-pic">
        <div class="container-fluid">
            <div class="row sp-40">
                <img src="/front-end2/img/room-pic/1.jpg" alt="">
                <img src="/front-end2/img/room-pic/2.jpg" alt="">
                <img src="/front-end2/img/room-pic/3.jpg" alt="">
                <img src="/front-end2/img/room-pic/4.jpg" alt="">
                <img src="/front-end2/img/room-pic/5.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Rooms Pic Section End -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center sp-60">
                <img src="/front-end2/img/only-logo.png" alt="">
            </div>
        </div>
        <div class="row p-37">
            <div class="col-md-3">
                <div class="about-footer">
                    <h5>{{ !empty(settings()->site_name) ? strtoupper(settings()->site_name) : __('custom.site_name') }}</h5>
                    <div class="footer-social">
                        <ul class="footer-links list-unstyled">
                            <a href="{{ !empty(settings()->facebook) ? settings()->facebook : __('custom.no_data_provided') }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ !empty(settings()->twitter) ? settings()->twitter : __('custom.no_data_provided') }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ !empty(settings()->instagram) ? settings()->instagram : __('custom.no_data_provided') }}"><i  class="fa fa-instagram"></i></a>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="about-footer">
                    <h5>{{ __('custom.categories') }}</h5>
                    <div class="footer-social">
                        <ul class="list-unstyled">
                            @foreach (categories() as $item)
                                <li><a href="{{ route('categories.view', $item) }}">{{ ucfirst($item->name) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    

             <div class="col-md-3">
                <div class="about-footer">
                    <h5>{{ __('custom.property_types') }}</h5>
                    <div class="footer-social">
                        <ul class="footer-links list-unstyled">
                            @foreach (PropertyTypes() as $p)
                                <li><a href="{{ route('property-types.view', $p) }}">{{ ucfirst($p->name) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-address">
                    <h5>{{ __('custom.get_in_touch') }}</h5>
                    <ul>
                        <li><i class="flaticon-placeholder"></i><span>{{ !empty(settings()->fullAddress()) ? settings()->fullAddress() : __('custom.no_data_provided') }}</span>
                        </li>
                        <li><i class="flaticon-smartphone"></i><span>{{ !empty(settings()->our_contact_number) ? settings()->our_contact_number : __('custom.no_data_provided') }}</span></li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="row p-20">
            <div class="col-lg-12 text-center">
                <div class="copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy; {{ !empty(settings()->site_name) ? settings()->site_name : __('custom.site_name') }}
                    {{ __('custom.all_rights_reserved') }}
                    {{   !empty(settings()->created_at) ? settings()->created_at->format(' Y') : __('custom.no_data_provided') }}
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="/front-end2/js/jquery-3.3.1.min.js"></script>
<script src="/front-end2/js/jquery.nice-select.min.js"></script>
<script src="/front-end2/js/owl.carousel.min.js"></script>
<script src="/front-end2/js/jquery-ui.min.js"></script>
<script src="/front-end2/js/jquery.slicknav.js"></script>
<script src="/front-end2/js/bootstrap.min.js"></script>
<script src="/front-end2/js/main.js"></script>

@stack('js')
</body>

</html>