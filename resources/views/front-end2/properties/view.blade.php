@extends('front-end2.layouts.main')
@section('content')

    <div class="single-property">
        <div class="container">
            
            <div class="row spad-p">
                <div class="col-lg-12">
                    
                    <div class="property-title">
                        <h3>{{ ucwords($property->name) }}</h3>
                        <a ><i class="fa flaticon-placeholder"></i> &nbsp;  <a href="{{ route('cities.view', $property->city) }}">{{ ucwords($property->city->name) }}</a>, <a href="{{ route('states.view', $property->state) }}">{{ ucwords($property->state->name) }}</a></a>
                    </div>

                    <div class="property-price">
                        <a class="h4" style="dispaly:block" href="{{ route('categories.view', $property->category) }}">{{ $property->category->name }}</a>
                        <p style="style=dispaly:block">{{ $property->price() }}</p>
                    </div>
                </div>
                
            </div>
                            
            <div class="row">
                <div class="col-lg-12">
                    <div class="property-img owl-carousel owl-loaded owl-drag">
    
    
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-2220px, 0px, 0px); transition: all 0.25s ease 0s; width: 6660px;">
                                <div class="owl-item cloned" style="width: 1110px;">
                                    <div class="single-img">
                                        <img src="{{ $property->featured() }}" alt="">
                                    </div>
                                </div>

                                @foreach ($property->extraImages() as $img)
                                    <div class="owl-item cloned" style="width: 1110px;">
                                        <div class="single-img">
                                            <img src="{{  $img }}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="property-details">
        <div class="container">
            <div class="row sp-40 spt-40">
                <div class="col-lg-8">
                    <div class="p-ins">

                        <div class="row details-top">
                            
                            <div class="col-lg-12">
                                <div class="t-details">
                                    <div class="register-id">
                                        <p>{{ __('custom.finish_type') }}: <span>{{ ucwords($property->finish_type ) }}</span></p>
                                    </div>
                                    <div class="popular-room-features single-property">
                                        <div class="size">
                                            <p>{{ __('custom.dimensionss') }}</p>
                                            <img src="/front-end2/img/rooms/size.png" alt="">
                                            <i class="flaticon-bath"></i>
                                            <span>{{ $property->dimensionss }} M2</span>
                                        </div>
                                        <div class="beds">
                                            <p>{{ __('custom.rooms_num') }}</p>
                                            <img src="/front-end2/img/rooms/bed.png" alt="">
                                            <span>{{ $property->rooms_num }}</span>
                                        </div>
                                        <div class="baths">
                                            <p>{{ __('custom.baths_num') }}</p>
                                            <img src="/front-end2/img/rooms/bath.png" alt="">
                                            <span>{{ $property->baths_num }}</span>
                                        </div>
                                        <div class="garage">
                                            <p>{{ __('custom.floors_num') }}</p>
                                            <img src="/front-end2/img/rooms/garage.png" alt="">
                                            <span>{{ $property->floors_num }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="garage">
                                    <span>{{ __('custom.payment_method') }}:</span>
                                    <p>{{ ucwords($property->payment_method) }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="garage">
                                            <span>{{ __('custom.is_price_negotiateable') }}:</span>
                                            <p>{{ ucwords($property->is_price_negotiateable == 1 ? __('custom.yes') : __('custom.no')) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="garage">
                                            <span>{{ __('custom.have_garden') }}:</span>
                                            <p>{{ ucwords($property->have_garden == 1 ? __('custom.yes') : __('custom.no') ) }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="garage">
                                            <span>{{ __('custom.will_be_available_on') }}:</span>
                                            <p>{{$property->will_be_available_on }}</p>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="garage">
                                            <span>{{ ucwords($property->furniture) }}</span>
                                        </div>  
                                    </div>
                                    <div class="col-md-4">
                                        <div class="garage">
                                            <span>{{ __('custom.seller_role') }}:</span>
                                            <p>{{ ucwords($property->seller_role) }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            
                        </div>

                        <div style="position: absolute;top: 18%;right: 2%;">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="property-description">
                                    <h4>{{ __('custom.description') }}</h4>
                                    <p>{!! $property->description !!} </p>
                                </div>

                                <div class="location-map">
                                    <h4>{{ __('custom.location') }}</h4>
                                    <div id="google-maps" style="max-width:1200px; height:600px"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row pb-30">
                        <div class="col-lg-12">
                            <div class="contact-service">
                                <img src="{{ $property->user->profilImage() }}" alt="">
                                <p>{{ __('custom.offered_by') }}</p>
                                <h5>{{ $property->user->fullName() }}</h5>
                                <table>
                                    <tbody>

                                        <tr>
                                            <td>{{ __('custom.phone') }} : <span>{{ $property->user->phone }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('custom.email') }} : <span>{{ $property->user->email }}</span></td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('custom.address') }} : <span>{{ $property->user->fullAddress() }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('users.profile', $property->user) }}" class="site-btn list-btn">{{ __('custom.view_profile') }}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="hotel-rooms spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-45">
                    <div class="found-items">
                        <h4>{{ __('custom.related_properties') }}</h4>
    
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_properties as $property)
                <div class="col-lg-4 col-md-4 col-md-6">
                    <div class="room-items">
                        <div class="room-img set-bg" data-setbg="{{ $property->featured() }}"
                            style="background-image: url('{{ $property->featured() }}')">
                            {{-- <div class="room-img set-bg" data-setbg="/front-end2/img/rooms/1.jpg" style="background-image: url('/front-end2img/rooms/1.jpg')"> --}}
                        </div>
                        <div class="room-text">
                            <div class="room-details">
                                <div class="room-title">
                                    <h5>{{ ucwords($property->name) }}</h5>
                                    <a href=""><i class="flaticon-placeholder"></i> <span>Location</span></a>
                                    <a href="{{ route('categories.view',$property->category ) }}" class="large-width"><i
                                            class="flaticon-cursor"></i>
                                        <span>{{ $property->propertyType->name }}</span></a>
                                </div>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <div class="size">
                                        <p>{{ __('custom.dimensionss') }}</p>
                                        <img src="/front-end2/img/rooms/size.png" alt="">
                                        <i class="flaticon-bath"></i>
                                        <span>{{ $property->dimensionss }}</span>
                                    </div>
                                    <div class="beds">
                                        <p>{{ __('custom.rooms_num') }}</p>
                                        <img src="/front-end2/img/rooms/bed.png" alt="">
                                        <span>{{ $property->rooms_num }}</span>
                                    </div>
                                    <div class="baths">
                                        <p>{{ __('custom.baths_num') }}</p>
                                        <img src="/front-end2/img/rooms/bath.png" alt="">
                                        <span>{{ $property->baths_num }}</span>
                                    </div>
                                    {{-- <div class="garage">
                                                        <p>Garage</p>
                                                        <img src="/front-end2/img/rooms/garage.png" alt="">
                                                        <span>1</span>
                                                    </div> --}}
                                </div>
                            </div>
                            <div class="room-price">
                                <span style="font-size:20px">{{ $property->price() }}</span>
                            </div>
                            <a href="{{ route('properties.view',$property ) }}" class="site-btn btn-line">View Property</a>
                        </div>
                    </div>
                </div>
                @endforeach
    
    
            </div>
    
        </div>
    </section>

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
@endsection