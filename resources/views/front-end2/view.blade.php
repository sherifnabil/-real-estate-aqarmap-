@extends('front-end2.layouts.main')
@section('content')

    <br><br>
    <section class="hotel-rooms spad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-45">
                    <div class="found-items">
                        <h4>{{ $title }}</h4>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-4 col-md-6">
                        <div class="room-items">
                            <div class="room-img set-bg" data-setbg="{{ $property->featured() }}" style="background-image: url('{{ $property->featured() }}')">                     
                                        {{-- <div class="room-img set-bg" data-setbg="/front-end2/img/rooms/1.jpg" style="background-image: url('/front-end2img/rooms/1.jpg')"> --}}
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-title">
                                        <h5>{{ ucwords($property->name) }}</h5>
                                        <a href=""><i class="flaticon-placeholder"></i> <span>Location</span></a>
                                        <a href="{{ route('categories.view',$property->category ) }}" class="large-width"><i class="flaticon-cursor"></i> <span>{{ $property->propertyType->name }}</span></a>
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
                                <div class="room-price" >
                                    <span style="font-size:20px">{{ $property->price() }}</span>
                                </div>
                                <a href="{{ route('properties.view',$property ) }}" class="site-btn btn-line">View Property</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
            </div>
            <br><br>

            <div class="row">
                <div class="col-lg-12 p-45">
                    <div class="found-items">
                        <h4>{{ __('custom.most_recent') }}</h4>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($recent_properties as $property)
                    <div class="col-lg-4 col-md-4 col-md-6">
                        <div class="room-items">
                            <div class="room-img set-bg" data-setbg="{{ $property->featured() }}" style="background-image: url('{{ $property->featured() }}')">                     
                                        {{-- <div class="room-img set-bg" data-setbg="/front-end2/img/rooms/1.jpg" style="background-image: url('/front-end2img/rooms/1.jpg')"> --}}
                            </div>
                            <div class="room-text">
                                <div class="room-details">
                                    <div class="room-title">
                                        <h5>{{ ucwords($property->name) }}</h5>
                                        <a href=""><i class="flaticon-placeholder"></i> <span>Location</span></a>
                                        <a href="{{ route('categories.view',$property->category ) }}" class="large-width"><i class="flaticon-cursor"></i> <span>{{ $property->propertyType->name }}</span></a>
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
                                <div class="room-price" >
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

@endsection