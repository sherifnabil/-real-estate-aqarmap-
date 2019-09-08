<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">{{ !empty(settings()->site_name) ? settings()->site_name : __('custom.site_name') }}</h3>
                        <p>{{ !empty(settings()->site_description) ? settings()->site_description : __('custom.description') }}</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>{{ !empty(settings()->fullAddress()) ? settings()->fullAddress() : __('custom.no_data_provided') }}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>{{ !empty(settings()->our_contact_number) ? settings()->our_contact_number : __('custom.no_data_provided') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>

                    <ul class="header-links  text-center">
                        <li class="inline-block">
                            <a href="{{ !empty(settings()->facebook) ? settings()->facebook : __('custom.no_data_provided') }}"><i style="font-size: 30px;" class="fa fa-facebook"></i></a>
                        </li>
                        <li class="inline-block">
                            <a href="{{ !empty(settings()->twitter) ? settings()->twitter : __('custom.no_data_provided') }}"><i style="font-size: 30px;" class="fa fa-twitter"></i></a>
                        </li>
                        <li class="inline-block">
                            <a href="{{ !empty(settings()->instagram) ? settings()->instagram : __('custom.no_data_provided') }}"><i style="font-size: 30px;" class="fa fa-instagram"></i></a>
                        </li>

                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; {{ !empty(settings()->site_name) ? settings()->site_name : __('custom.site_name') }} {{ __('custom.all_rights_reserved') }}  {{   !empty(settings()->created_at) ? settings()->created_at->format(' Y') : __('custom.no_data_provided') }}
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="/front-end/js/jquery.min.js"></script>
<script src="/front-end/js/bootstrap.min.js"></script>
<script src="/front-end/js/slick.min.js"></script>
<script src="/front-end/js/nouislider.min.js"></script>
<script src="/front-end/js/jquery.zoom.min.js"></script>
<script src="/front-end/js/main.js"></script>
@stack('js')
</body>

</html>