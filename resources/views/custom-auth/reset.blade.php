@include('front-end2.layouts.header')
@include('front-end2.layouts.nav')
<!-- SECTION -->
<div class="section">
        <!-- container -->
    <div class="container">
            <!-- row -->
            <h2 class="text-center">{{ __('Reset Password') }}</h2> <br><br>
        <div class="row ">

            
            <div class="form-group col-md-8 col-md-offset-4">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <div class="form-group row">
                        <div class="col-md-6">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus >
                    
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                
                        <div class="col-md-6">
                            <label>{{ __('custom.password') }}: </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" >
                    
                            </div>

                    </div>

                    <div class="form-group row">
                    
                        <div class="col-md-6">
                            <label>{{ __('custom.password_confirmation') }}: </label>
                            <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="current-password" >
                    
                        </div>

                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary text-center form-control">
                                       {{ __('Reset Password') }}

                                </button>
                                
                            </div>
                        </div>   
                    </div>
                    


            </form>

                
            </div>
        </div>

    </div>
        <!-- /row -->
</div>



@include('front-end2.layouts.footer')