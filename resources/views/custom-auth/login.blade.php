@include('front-end2.layouts.header')
@include('front-end2.layouts.nav')
{{-- @include('front-end.layouts.nav') --}}


<!-- SECTION -->
<!-- container -->
                <div class=" container">
                    <br>
                    {{-- <div class="col-md-10 col-md-offset-2"> --}}
                    <!-- row -->
                    <h2 class="text-center">{{ __('custom.login') }}</h2> <br><br>
                    <div class=" ">

                        <div class="col-md-6"></div>
                        <div class="form-group col-md-11">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class=" ">
                                    <div class="form-group row">
                                        <div class="col-md-6 col-md-6 offset-md-4">
                                            @include('front-end._message')
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('custom.email') }}" autofocus>
                                    
             
                                        </div>
        
                                    </div>
                                    
                                    <div class="form-group row">
                                    
                                        <div class="col-md-6 col-md-6 offset-md-4">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" placeholder="{{ __('custom.password') }}">
                                    
                                            </div>

                                    </div>
                                    
                                    <div class="form-group row">

                                        <div class="col-md-4 offset-md-4">
                                            <div class="form-check">
                                                <label for="remember">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                    {{ __('custom.rememberme') }}
                                                </label>
                                    
                                        
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary text-center form-control">
                                                    {{ __('Login') }}

                                            </button>
                                            
                                        </div>
                                    </div>   
                                </div>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-danger form-control" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}

                                        </a>
                                        @endif
                                    </div>
                                </div>

                            </form>
                            <br>
                            
                            </div>
                        </div>

                    {{-- </div> --}}
                    <!-- /row -->
                </div>



@include('front-end2.layouts.footer')