@include('front-end.layouts.header')
@include('front-end.layouts.nav')


<!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <h2 class="text-center">{{ __('custom.forgot_password') }}</h2> <br><br>
            <div class="row ">

            
            <div class="form-group col-md-8 col-md-offset-4">

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <div class="form-group row">
                            <div class="col-md-6">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('custom.email') }}" autofocus>
                        
    
                            </div>

                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary text-center form-control">
                                        {{ __('Send Password Reset Link') }}

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



@include('front-end.layouts.footer')