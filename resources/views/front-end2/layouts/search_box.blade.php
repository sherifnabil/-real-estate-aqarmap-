<!-- Filter Search Section Begin -->
<div class="filter-search">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
               

                <div class="header-search" style="padding: 15px 0px;">
                    <form>
                        <select class="input-select" style="color:#fff; font-weight:700;background: rgb(45, 43, 84);border-top:none;margin-right: -4px; width: 20%;border-radius: 40px 0px 0px 40px;height:80px; padding-left:5%">
                            <option value="0"> {{ __('custom.category') }} </option>
                            <option value="1"> Category 01</option>
                            <option value="1"> Category 02</option>
                        </select>

                        <select class="input-select" style="color:#fff; font-weight:700;background: rgb(45, 43, 84); border:none;margin-right: -4px; width: 20%;height:80px; padding-left:5%; padding-right:2%">
                            <option value="0"> {{ __('custom.property_type') }} </option>
                            <option value="1"> Category 01</option>
                            <option value="1"> Category 02</option>
                        </select>
                        <input class="input" style="height: 80px;padding: 0px 15px; border: 1px solid #E4E7ED;background-color: #FFF; width:50%;" placeholder="{{ __('custom.search') }}">
                        <button style="    height: 80px;width: 10%;background: rgb(45, 43, 84);color: #FFF;font-weight: 700;float: right;border: none;border-radius: 0px 40px 40px 0px;" class="search-btn">{{ __('custom.search') }}</button>
                    </form>
                </div>
               
                {{-- <form class="filter-form">
                    <div class="location">
                        <p>Location</p>
                        <select class="filter-location">
                            <option value="">London</option>
                            <option value="">US</option>
                            <option value="">UAE</option>
                        </select>
                    </div>
                    <div class="search-type">
                        <p>Property Type</p>
                        <select class="filter-property">
                            <option value="">House</option>
                            <option value="">Resort</option>
                            <option value="">Hotel</option>
                        </select>
                    </div>
                    <div class="price-range">
                        <p>Price</p>
                        <div class="range-slider">
                            <div id="slider-range">
                                <div tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default slider-left">
                                    50k</div>
                                <div tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default slider-right">
                                    300k</div>
                            </div>
                        </div>
                    </div>
                    <div class="bedrooms">
                        <p>Bedrooms</p>
                        <div class="room-filter-pagi">
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-1">
                                <label for="room-1">1</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-2">
                                <label for="room-2">2</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-3">
                                <label for="room-3">3</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="room" id="room-4">
                                <label for="room-4">4+</label>
                            </div>
                        </div>
                    </div>
                    <div class="bathrooms">
                        <p>Bathrooms</p>
                        <div class="room-filter-pagi">
                            <div class="bf-item">
                                <input type="radio" name="bathroom" id="bathroom-1">
                                <label for="bathroom-1">1</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="bathroom" id="bathroom-2">
                                <label for="bathroom-2">2</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="bathroom" id="bathroom-3">
                                <label for="bathroom-3">3</label>
                            </div>
                            <div class="bf-item">
                                <input type="radio" name="bathroom" id="bathroom-4">
                                <label for="bathroom-4">4+</label>
                            </div>
                        </div>
                    </div>
                    <div class="search-btn">
                        <button type="submit"><i class="flaticon-search"></i>Search</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- Filter Search Section End -->