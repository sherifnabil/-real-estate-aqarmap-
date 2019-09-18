@extends('front-end2.layouts.main')
@section('content')

@push('css')
<link rel="stylesheet" href="/datepicker/bootstrap-datepicker.css">
@endpush

    <div class="container ">
        <div class="billing-details">
            <br>
            <div class="section-title">
                <h3 class="h2">{{ $title }}</h3>
            </div>

            @include('front-end._message')

            <form action="{{ route('store.property') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.name') }}: </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.seller_role') }}: </label>
                            <select name="seller_role" class="form-control">
                                <option></option>
                                @foreach ($seller_roles as $k => $v)
                                    <option {{ old('seller_role') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.price') }}: </label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>@lang('custom.description')</label>
                    <textarea name="description" class="ckeditor form-control" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="row">
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.phone') }}: </label>
                            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                value="{{ old('contact') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.payment_method') }}: </label>
                            <select name="payment_method" class="form-control">
                                <option></option>
                                @foreach ($payment_methods as $k => $v)
                                    <option {{ old('payment_methods') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.is_price_negotiateable') }}: </label>
                            <select name="is_price_negotiateable" class="form-control">
                                <option></option>
                                @foreach ($booleans as $k => $v)
                                    <option {{ old('is_price_negotiateable') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label>@lang('custom.featured')</label>
                    <input type="file" name="featured" class="form-control image" value="{{ old('featured') }}">
                </div>


                <div class="form-group">
                    <img src="{{ asset('4.png')}}" class="img-thumbnail image-preview" alt=""
                        style="width:250px; height:200px">
                </div>


                <div class="form-group">
                    <label>@lang('custom.extra_images')</label>
                    <input type="file" multiple="multiple" value="{{ old('extra_images') }}" name="extra_images[]"
                        class="form-control">
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('custom.have_garden') }}: </label>
                            <select name="have_garden" class="form-control">
                                <option></option>
                                @foreach ($booleans as $k => $v)
                                    <option {{ old('have_garden') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>{{ __('custom.finish_type') }}: </label>
                            <select name="finish_type" class="form-control">
                                <option></option>
                                @foreach ($finish_types as $k => $v)
                                <option {{ old('finish_type') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>{{ __('custom.furniture') }}: </label>
                            <select name="furniture" class="form-control">
                                <option></option>
                                @foreach ($furnish as $k => $v)
                                    <option {{ old('furniture') == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>{{ __('custom.will_be_available_on') }}: </label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' id='mydatetimepicker1' name="will_be_available_on" required
                                    class="form-control @error('will_be_available_on') is-invalid @enderror"
                                    value="{{ old('will_be_available_on') }} " />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label>{{ __('custom.floors_num') }}: </label>
                            <input id="floors_num" type="number" class="form-control @error('floors_num') is-invalid @enderror" name="floors_num" value="{{ old('floors_num') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>{{ __('custom.rooms_num') }}: </label>
                            <input id="rooms_num" type="number" class="form-control @error('rooms_num') is-invalid @enderror"name="rooms_num" value="{{ old('rooms_num') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>{{ __('custom.baths_num') }}: </label>
                            <input id="baths_num" type="number" class="form-control @error('baths_num') is-invalid @enderror"  name="baths_num" value="{{ old('baths_num') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>{{ __('custom.dimensionss') }}: </label>
                            <input id="dimensionss" type="number" class="form-control @error('dimensionss') is-invalid @enderror"  name="dimensionss" value="{{ old('dimensionss') }}" required placeholder="M2">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <label>{{ __('custom.category') }}: </label>
                    <select name="category_id" class="form-control">
                        <option></option>
                        @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group ">
                    <label>{{ __('custom.property_type') }}: </label>
                    <select name="property_type_id" class="form-control">
                        <option></option>
                        @foreach ($property_types as $p)
                            <option {{ old('property_type_id') == $p->id ? 'selected' : '' }} value="{{ $p->id }}"> {{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <label>{{ __('custom.city') }}: </label>
                    <select name="city_id" id="city" class="form-control">
                        <option></option>
                        @foreach ($cities as $city)
                            <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}"> {{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="statesContainer"></div>

            </div>

            <div class="form-group">

                <input type="hidden" id="latitude" name="lat" value="">
                <input type="hidden" id="longitude" name="long" value="">
            </div>
            <div id="google-maps" style="max-width:1200px;height:650px; margin-bottom: 20px"></div>


            <div class="form-group">

            <button type="submit" class="btn btn-success submit pull-right">{{ $title }}</button>
        </div>
    </form>
    <br><br>
    </div>
</div>

@push('js')
<script src="/noty/noty.min.js"></script>

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

<script>
    $('#mydatetimepicker1').datepicker({
        'autoclose': true,
        'format': 'dd-mm-yyyy',
        'rtl': '',
        'language': 'en',
        'clearBtn': true,
        // 'orientation': '',
    });
                
                
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqQZukuqiPG12VkNYG0JWLf6jXa8bqPfU&libraries=places"
    type="text/javascript"></script>
<script type="text/javascript">
    function triggerGoogleMaps() {
                    var maps = new google.maps.Map(document.getElementById('google-maps'), {
                        center:{
                            lat: parseFloat('30.0444196'),
                            lng: parseFloat('31.23571160000006'),
                        },
                        zoom: 6
                    });
    
                    var marker = new google.maps.Marker({
                        position : {
                            lat: parseFloat('30.0444196'),
                            lng: parseFloat('31.23571160000006'),
                        },
                        map : maps,
                        draggable : true
    
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
<script src="/ckeditor/ckeditor.js"></script>
<script src="/datepicker/bootstrap-datepicker.min.js"></script>
{{-- <script src="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"></script> --}}
<script src="{{ asset('/adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>


@include('custom-auth.ajax')
@include('front-end._session')
@endpush

@endsection