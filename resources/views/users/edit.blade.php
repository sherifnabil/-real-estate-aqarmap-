@extends('admins.partials.main')
@section('content')


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
    <form action="{{ route('users.update', $row) }}" method="POST" role="form" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>{{ __('custom.first_name') }}: </label>
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                    name="first_name" value="{{ $row->first_name }}" required autocomplete="first_name" autofocus>
            </div>

            <div class="form-group">
                <label>{{ __('custom.last_name') }}: </label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ $row->last_name }}" required autocomplete="last_name">
            </div>


            <div class="form-group">
                <label>{{ __('custom.email') }}: </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $row->email }}" required autocomplete="email">

            </div>


            <div class="form-group ">
                <label>{{ __('custom.user_type') }}: </label>

                <select name="user_type" class="form-control">
                    <option></option>
                    @foreach ($userTypes as $type)
                    <option value="{{ $type }}" {{ $row->user_type == $type  ? 'selected' : '' }}>{{ ucwords($type) }}</option>
                    @endforeach
                </select>

            </div>


            <div class="form-group">
                <label>@lang('custom.profile_image')</label>
                <input type="file" name="profile_image" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{ $row->profilImage() }}" class="img-thumbnail image-preview" alt=""
                    style="width:250px; height:200px">
            </div>



            <div class="form-group ">

                <label>{{ __('custom.password') }}: </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password"  >

            </div>

            <div class="form-group ">

                <label>{{ __('custom.password_confirmation') }}: </label>
                <input id="password_confirmation" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                    >

            </div>

            <div class="form-group ">
                <label>{{ __('custom.phone') }}: </label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ $row->phone }}" required autocomplete="phone">


            </div>

            <div class="form-group ">
                <label>{{ __('custom.address') }}: </label>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ $row->address }}" required autocomplete="address">

            </div>


            <div class="form-group ">
                <label>{{ __('custom.city') }}: </label>


                <select name="city_id" id="city" class="form-control">
                    <option></option>
                    @foreach ($cities as $city)
                    <option {{ $row->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">
                        {{ $city->name }}</option>
                    @endforeach
                </select>

            </div>




            <div class="form-group ">
                <label>{{ __('custom.state') }}: </label>


                <select name="state_id" class="form-control">
                    <option></option>
                    @foreach ($states as $state)
                    <option {{ $row->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">
                        {{ $city->name }}</option>
                    @endforeach
                </select>

            </div>
            {{-- 
            <div class="form-group ">
                <label>{{ __('custom.state') }}: </label>
            <select name="state_id" id="state" class="form-control">
                <option></option>

            </select>

        </div> --}}



        <div>
            <button type="submit"
                class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">{{ $title }}</button>
        </div>
</div>
<!-- /.box-body -->

</form>

@push('js')
<script src="/noty/noty.min.js">
</script>

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



@include('custom-auth.ajax')
@include('front-end._session')
@endpush
@endsection