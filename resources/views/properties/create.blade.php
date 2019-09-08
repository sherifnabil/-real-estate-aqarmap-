@extends('admins.partials.main')
@section('content')
@push('css')

    <link rel="stylesheet" href="/datepicker/bootstrap-datepicker.css">
@endpush

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">{{ $title }}</li>
        </ol>
        <h3>{{ $title }}</h3>
    </section>
    {{-- add your content here --}}
        @include('front-end._message')        
    <div class="content-body">

        <form action="{{ route('properties.store') }}" method="POST"   role="form" enctype="multipart/form-data">

            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('custom.name') }}: </label>
                        <input 
                            id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name"
                            value="{{ old('name') }}" 
                            required 
                            autocomplete="name" 
                            autofocus
                        >
                </div>


                <div class="form-group ">
                    <label >{{ __('custom.user') }}: </label>


                    <select name="user_id" class="form-control" >
                            <option ></option>
                            @foreach ($users as $user)
                                <option  value="{{ $user->id }}">{{ $user->fullName() }}</option>
                            @endforeach
                    </select>
                    
                </div>



                <div class="form-group ">
                    <label >{{ __('custom.seller_role') }}: </label>


                    <select name="seller_role" class="form-control" >
                            <option ></option>
                            @foreach ($seller_roles as $k => $v)
                                <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>



                <div class="form-group">
                    <label >@lang('custom.description')</label>
                    <textarea name="description" class="ckeditor form-control" id="" cols="30" rows="10"></textarea>
                </div>


                <div class="form-group ">
                    <label>{{ __('custom.price') }}: </label>                                            
                    <input 
                        id="price" 
                        type="number" 
                        class="form-control @error('price') is-invalid @enderror" 
                        name="price"
                        value="{{ old('price') }}" 
                        required 
                    >
                
                </div>

                <div class="form-group ">
                    <label >{{ __('custom.is_price_negotiateable') }}: </label>


                    <select name="is_price_negotiateable" class="form-control" >
                            <option ></option>
                            @foreach ($booleans as $k => $v)
                                <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>


                <div class="form-group ">
                    <label >{{ __('custom.payment_method') }}: </label>


                    <select name="payment_method" class="form-control" >
                            <option ></option>
                            @foreach ($payment_methods as $k => $v)
                                <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>



                <div class="form-group ">
                    <label>{{ __('custom.phone') }}: </label>
                    <input 
                        id="contact" 
                        type="text" 
                        class="form-control @error('contact') is-invalid @enderror" 
                        name="contact"
                        value="{{ old('contact') }}" 
                        required 
                    >
            

                </div>
        


                
                <div class="form-group">
                    <label >@lang('custom.featured')</label>
                    <input type="file"  name="featured" class="form-control image">
                </div>
                <div class="form-group">
                    <img src="{{ asset('4.png')}}" class="img-thumbnail image-preview" alt="" style="width:250px; height:200px">
                </div>
                        
                <div class="form-group">
                    <label >@lang('custom.extra_images')</label>
                    <input type="file" multiple="multiple"  name="extra_images[]" class="form-control">
                </div>




                <div class="form-group ">
                    <label >{{ __('custom.have_garden') }}: </label>


                    <select name="have_garden" class="form-control" >
                            <option ></option>
                            @foreach ($booleans as $k => $v)
                            <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>




                <div class="form-group ">
                    <label >{{ __('custom.finish_type') }}: </label>


                    <select name="finish_type" class="form-control" >
                            <option ></option>
                            @foreach ($finish_types as $k => $v)
                                <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>


                <div class="form-group ">
                    <label >{{ __('custom.furniture') }}: </label>


                    <select name="furniture" class="form-control" >
                            <option ></option>
                            @foreach ($furnish as $k => $v)
                                <option  value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                    </select>
                    
                </div>




                <div class="form-group ">
                    <label>{{ __('custom.floors_num') }}: </label>                                            
                    <input 
                        id="floors_num" 
                        type="number" 
                        class="form-control @error('floors_num') is-invalid @enderror" 
                        name="floors_num"
                        value="{{ old('floors_num') }}" 
                        required 
                    >
                
                </div>



                <div class="form-group ">
                    <label>{{ __('custom.rooms_num') }}: </label>                                            
                    <input 
                        id="rooms_num" 
                        type="number" 
                        class="form-control @error('rooms_num') is-invalid @enderror" 
                        name="rooms_num"
                        value="{{ old('rooms_num') }}" 
                        required 
                    >
                
                </div>

                <div class="form-group">
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
                            <label>{{ __('custom.baths_num') }}: </label>                                            
                            <input 
                                id="baths_num" 
                                type="number" 
                                class="form-control @error('baths_num') is-invalid @enderror" 
                                name="baths_num"
                                value="{{ old('baths_num') }}" 
                                required 
                            >
                        
                        </div>
    
                    </div>
    
                    
                </div>



                <div class="form-group ">
                    <label>{{ __('custom.dimensionss') }}: </label>                                            
                    <input 
                        id="dimensionss" 
                        type="number" 
                        class="form-control @error('dimensionss') is-invalid @enderror" 
                        name="dimensionss"
                        value="{{ old('dimensionss') }}" 
                        required 
                        placeholder="M2"
                    >
                
                </div>

                
                <div class="form-group ">
                    <label >{{ __('custom.category') }}: </label>


                    <select name="category_id"  class="form-control" >
                            <option ></option>
                            @foreach ($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                    
                </div>

                                        
                <div class="form-group ">
                    <label >{{ __('custom.property_type') }}: </label>


                    <select name="property_type_id"  class="form-control" >
                            <option ></option>
                            @foreach ($property_types as $p)
                                <option {{ old('property_type_id') == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                    </select>
                    
                </div>

            

                <div class="form-group ">
                    <label>{{ __('custom.status') }}: </label>
                
                
                    <select name="status" class="form-control">
                        <option></option>
                        @foreach ($status as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                
                </div>


                <div class="form-group ">
                    <label >{{ __('custom.city') }}: </label>


                    <select name="city_id" id="city" class="form-control" >
                            <option ></option>
                            @foreach ($cities as $city)
                            <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                    </select>
                    
                </div>



                            
                <div class="form-group ">
                    <label >{{ __('custom.state') }}: </label>


                    <select name="state_id"  class="form-control" >
                            <option ></option>
                            @foreach ($states as $state)
                                <option {{ old('state_id') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                    </select>
                    
                </div>



                {{-- <div class="form-group ">
                    <label>{{ __('custom.state') }}: </label>
                    <select name="state_id" id="state" class="form-control" >
                        <option ></option>

                    </select>

                </div> --}}


                <input  type="hidden" id="latitude" name="lat" value="">
                <input  type="hidden" id="longitude" name="long" value="">
                <div class="form-group">
                    <div id="google-maps" style="width:100%;height:450px;"></div>
                    
                    
                    <div >
                </div><br><br>

                    <button type="submit" class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">{{ $title }}</button>
                </div>
            </div>
            <!-- /.box-body -->

        </form>
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
            
            $('#datetimepicker1').datepicker({
                'autoclose': true,
                'format': 'dd-mm-yyyy',
                'rtl': '{{ app()->getLocale() == "ar" ? true : false }}',
                'language': '{{ app()->getLocale() }}',
                'clearBtn': true,
                // 'orientation': '',
            });
            console.log($('#mydatetimepicker1').val);
            
            
        </script>

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
            
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}

        @include('custom-auth.ajax')
        @include('front-end._session')
    @endpush
@endsection