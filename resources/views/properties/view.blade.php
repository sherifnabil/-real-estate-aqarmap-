@include('front-end.layouts.header')
@include('front-end.layouts.nav')


<div class="container ">
    <br><br>



    <div class="row">
        <!-- Product main img -->
        <div class="col-md-5 col-md-push-2">
            <div id="product-main-img" class="slick-initialized slick-slider"><button class="slick-prev slick-arrow"
                    aria-label="Previous" type="button" style="display: block;">Previous</button>
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 1832px;">
                        <div class="product-preview slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1"
                            style="width: 458px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 1; overflow: hidden; transition: opacity 300ms ease 0s;">
                            <img src="{{ $property->featured() }}" alt="">
                            <img role="presentation"
                                src="{{ $property->featured() }}"
                                class="zoomImg"
                                style="position: absolute; top: -87.4323px; left: -1.86026px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                        </div>
                        @foreach ($property->extraImages() as $img)
                            <div class="product-preview slick-slide slick-cloned" tabindex="-1" style="width: 155px;"
                                role="tabpanel" aria-describedby="slick-slide-control11" data-slick-index="-3"
                                aria-hidden="true">
                                <img src="{{  $img }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div>
    
                <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">Next</button>
            </div>
        </div>
        <!-- /Product main img -->
    
        <!-- Product thumb imgs -->
        <div class="col-md-2  col-md-pull-5">
            <div id="product-imgs" class="slick-initialized slick-slider slick-vertical"><button
                    class="slick-prev slick-arrow" aria-label="Previous" type="button"
                    style="display: block;">Previous</button>
                <div class="slick-list draggable" style="height: 465px; padding: 0px;">
                    <div class="slick-track" style="opacity: 1; height: 1860px; margin:25px 0">
                        <div class="product-preview slick-slide slick-cloned" tabindex="-1" style="width: 155px;"
                            role="tabpanel" aria-describedby="slick-slide-control10" data-slick-index="-4"
                            aria-hidden="true">
                            <img src="{{ $property->featured() }}" alt="">
                        </div>
                        @foreach ($property->extraImages() as $img)
                            <div class="product-preview slick-slide slick-cloned" tabindex="-1" style="width: 155px;"
                                role="tabpanel" aria-describedby="slick-slide-control11" data-slick-index="-3"
                                aria-hidden="true">
                                <img src="{{  $img }}" alt="">
                            </div>
                        @endforeach

                    </div>
                </div><button class="slick-next slick-arrow" aria-label="Next" type="button"
                    style="display: block;">Next</button>
            </div>
        </div>
        <!-- /Product thumb imgs -->
    
        <!-- Product details -->
        <div class="col-md-5">
            <div class="product-details">
                @can ('update', $property)
                    <div class="" style="position: absolute;top: 15px;right: 20px;">
                        <form action="{{ route('properties.destroy', $property) }}">
                                <button type="submit" class="btn btn-danger">
                                   <i class="fa fa-trash"></i>
                                </button>
                        </form>
                    </div>

                @endcan
                @can ('delete', $property)
                    
                    <div class="" style="position: absolute;top: 15px;right: 65px;">
                        <a href="{{ route('edit.property', $property) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                        </a>
                    </div>
                @endcan
                <h2 class="product-name">{{ $property->price() }}</h2>

                <div>
                    <h3 class="product-price">{{ ucwords($property->name) }}</h3>
                </div>

    
                <div class="product-options">
                    <label>
                        {{ __('custom.dimensionss') }} : 
                            <span value="0">{{ $property->dimensionss }} M2</span>
                    </label>
                    <label>
                        {{ ucwords($property->furniture) }}
                    </label>
                </div>
    
                <div class="add-to-cart">
                    <div class="qty-label alert alert-warning">
                        {{ __('custom.will_be_available_on') . ' : ' . $property->will_be_available_on }}
                    </div>
                    <span class="add-to-cart">{{ __('custom.phone') }} : {{ $property->contact }}</span>
                </div>
    
                <ul class="product-btns">
                    <li><span> {{ __('custom.rooms_num') . ' : ' . $property->rooms_num }}</span></li>
                    <li><span>{{ __('custom.baths_num') . ' : ' . $property->baths_num }}</span></li>
                </ul>
    
                <ul class="product-links">
                    <li>{{ __('custom.category') }}:</li>
                    <li><a href="{{ route('categories.view', $property->category) }}">{{ ucwords($property->category->name) }}</a></li>

                    <li>{{ __('custom.have_garden') }}:</li>
                    <li><span>{{ ucwords($property->have_garden == 1 ? __('custom.yes') : __('custom.no') ) }}</span></li>
                
                </ul>
                
                <ul class="product-links">
                    <li>{{ __('custom.floors_num') }}:</li>
                    <li><span>{{ ucwords($property->floors_num) }}</span></li>

                    <li>{{ __('custom.is_price_negotiateable') }}:</li>
                    <li><span>{{ ucwords($property->is_price_negotiateable == 1 ? __('custom.yes') : __('custom.no')) }}</span></li>

                </ul>

                <ul class="product-links">
                    <li>{{ __('custom.payment_method') }}:</li>
                    <li><span>{{ ucwords($property->payment_method) }}</span></li>   

                    <li>{{ __('custom.finish_type') }}:</li>
                    <li><span>{{ ucwords($property->finish_type ) }}</span></li>

                </ul>


                <ul class="product-links">
                    <li>{{ __('custom.city') }}:</li>
                    <li><a href="{{ route('cities.view', $property->city) }}">{{ ucwords($property->city->name) }}</a></li>   

                    <li>{{ __('custom.state') }}:</li>
                    <li><a href="{{ route('states.view', $property->state) }}"> {{ ucwords($property->state->name ) }}</a></li>

                </ul>



                <ul class="product-links">
                    <li>{{ __('custom.seller_role') }}:</li>
                    <li><span>{{ ucwords($property->seller_role) }}</span></li>   

                </ul>

                <ul class="product-links">
                    <li>{{ __('custom.offered_by') }}:</li>
                    <li><a href="{{ route('users.profile', $property->user) }}"> {{ ucwords($property->user->fullName()) }}</a></li>
                
                </ul>

    
            </div>
        </div>
        <!-- /Product details -->
    
        <!-- Product tab -->
        <div class="col-md-12">
            <div id="product-tab">
                <!-- product tab nav -->
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1" aria-expanded="true">{{ __('custom.description') }}</a></li>
                </ul>
                <!-- /product tab nav -->
    
                <!-- product tab content -->
                <div class="tab-content">
                    <!-- tab1  -->
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-md-12">
                                {!! $property->description !!}
                            </div>
                        </div>
                    </div>
                    <!-- /tab1  -->
    

                </div>
                <!-- /product tab content  -->
            </div>
        </div>
        <!-- /product tab -->
        <div class="col-md-12">
            <div id="product-tab">
                    <div id="google-maps" style="max-width:1200px; height:600px"></div>

                </div>

            </div>
        </div>
        
        <br><br>    <br><br>

        <div class="row">
        
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">{{ __('custom.related_properties') }}</h3>
                </div>
            </div>
        

            @foreach ($related_properties as $item)
                    
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ $item->featured() }}">
                        </div>
                        <div class="product-body">
                            <p class="product-category"><a href="{{ route('categories.view', $item->category) }}">{{ ucwords($item->category->name) }}</a></p>
                            <h3 class="product-name"><a href="{{ route('properties.view', $item) }}">{{ ucwords($item->name) }}</a></h3>
                            <h4 class="product-price">{{ $item->price() }} </h4>
                        </div>
                    </div>
                </div>
            @endforeach        

        
        </div>
    </div>
</div><br><br><br>


@push('js')
<!-- Bootstrap -->
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqQZukuqiPG12VkNYG0JWLf6jXa8bqPfU&libraries=places"
        type="text/javascript"></script>
<script type="text/javascript">
    function triggerGoogleMaps() {
        var maps = new google.maps.Map(document.getElementById('google-maps'), {
            center:{
                lat: parseFloat('{{ $property->lat }}'),
                lng: parseFloat('{{ $property->long }}'),
            },
            zoom: 6
        });

        var marker = new google.maps.Marker({
            position : {
                lat: parseFloat('{{ $property->lat }}'),
                lng: parseFloat('{{ $property->long }}'),
            },
            map : maps,
            // draggable : true
        });

        var search = new google.maps.places.SearchBox(document.getElementById('address'));


        google.maps.event.addListener(search,'places_changed',function(){
            var places = search.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            maps.fitBounds(bounds);
            maps.setZoom(8);
        });

        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $("#latitude").val(lat);
            $("#longitude").val(lng);
        });
        google.maps.event.addListener(maps,'zoom_changed', function() {
                    var zoom = maps.getZoom();
                });
            }

    triggerGoogleMaps()
</script>
@endpush
@include('front-end.layouts.footer')


