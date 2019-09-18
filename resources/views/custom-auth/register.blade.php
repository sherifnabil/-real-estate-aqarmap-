@include('front-end2.layouts.header')
@include('front-end2.layouts.nav')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <br>
        <h2 class="text-center">{{ __('custom.registeration') }}</h2> <br><br>
        <!-- row -->
        {{-- <div class="row "> --}}
        <div class="form-group col-md-11">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="col-md-10 ">
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            @include('front-end._message')
                            <label>{{ __('custom.first_name') }}: </label>
                            <input id="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"  value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        </div>
                    </div>


                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.last_name') }}: </label>
                            <input id="last_name" type="text"  class="form-control @error('last_name') is-invalid @enderror" name="last_name"  value="{{ old('last_name') }}" required autocomplete="last_name">
                        </div>
                    </div>
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.email') }}: </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                    </div>
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.password') }}: </label>
                            <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.password_confirmation') }}: </label>
                            <input id="password_confirmation" type="password"  class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.phone') }}: </label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"  name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        </div>
                    </div>

                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.address') }}: </label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                        </div>
                    </div>
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.city') }}: </label>
                            <select name="city_id" id="city" class="form-control">
                                <option></option>
                                @foreach ($cities as $city)
                                    <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}"> {{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class=" ">
                        <div class="col-md-8  offset-md-4">
                            <label>{{ __('custom.state') }}: </label>
                            <select name="state_id" class="form-control">
                                <option></option>
                                @foreach ($states as $state)
                                <option {{ old('state_id') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">
                                        {{ $state->name }}
                                    </option>
                                    @endforeach
                            </select>
                                <div id="statesContainer"></div>                            
                        </div>
                    </div>
                    
                    <br>
                    <div class="  mt-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary text-center form-control">
                                {{ __('custom.register') }}
                                
                            </button>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- </div> --}}
    </div>

</div>
<!-- /row -->
@push('js')
    
@include('custom-auth.ajax')
@endpush


@include('front-end2.layouts.footer')