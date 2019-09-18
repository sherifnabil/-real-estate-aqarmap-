@include('front-end.layouts.header')
@include('front-end.layouts.nav')


<div class="container">
    <br><br>

    <div class="row">
        <!-- ASIDE -->
        <div id="aside" class="col-md-4">

    
            
            <!-- aside Widget -->
            <div class="aside">
                <h3 class="aside-title">{{ __('custom.most_recent') }}</h3>
                @foreach ($recent_properties as $item)
                    <div class="product-widget">
                        <div class="product-img">
                            <img style="width:60px; heightr:60px" src="{{ $item->featured() }}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category"><a href="{{ route('categories.view', $item->category) }}">{{ ucwords($item->category->name) }}</a></p>
                            <h3 class="product-name"><a href="{{ route('properties.view', $item) }}">{{ ucwords($item->name) }}</a></h3>
                            <h4 class="product-price">{{ $item->price() }}</h4>
                        </div>
                    </div>
                
                @endforeach
               
            </div>
            <!-- /aside Widget -->
        </div>
        <!-- /ASIDE -->
    
        <!-- STORE -->
        <div id="store" class="col-md-8">

    
            <!-- store products -->
            <div class="row">

                @foreach ($properties as $property)

                    <!-- product -->
                    <div class="ROW">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ $property->featured() }}" alt="">
                                <div class="product-label">
                                    <a class="product-label " href="{{ route('properties.view',$property ) }}"><span class="sale"><i class="fa fa-eye" style="font-size: 18px" ></i></span></a>
                                </div>
                                <div class="product-label">
                                    
                                </div>
                            </div>
                            <div class="product-body">
                                <h2 class="product-category inline-block" style="display:inline-block"><a href="{{ route('categories.view',$property->category ) }}">{{ $property->category->name }}</a></h2>
                                - <h2 class="product-category inline-block" style="display:inline-block"><a href="{{ route('property-types.view', $property->propertyType) }}">{{ $property->propertyType->name }}</a></h2>
                                - <h2 class="product-category inline-block" style="display:inline-block">{{ $property->finish_type }}</h2>                                - <h2 class="product-category inline-block" style="display:inline-block">{{ $property->furniture }}</h2>
                                <h3 class="product-name">{{ ucwords($property->name) }}</h3>
                                <h4 class="product-price">{{ $property->price() }} </h4>

                                <div class="product-btns">
                                    <a href="{{ route('cities.view', $property->city) }}" class="add-to-wishlist" style="display:inline-block">{{ $property->city->name }}</span></a>
                                    <button class="add-to-wishlist">{{ ucwords($property->payment_method) }}</button>             
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /product -->

                    <br><br><br>
                @endforeach    



                <div class="clearfix visible-sm visible-xs"></div>

                <span class="store-qty">Showing 20-100 products</span>
                
                <ul class="store-pagination">
                    <li class="active">1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <!-- /store bottom filter -->
        </div>
        <!-- /STORE -->
    </div>
</div>

<br><br><br>
@include('front-end.layouts.footer')