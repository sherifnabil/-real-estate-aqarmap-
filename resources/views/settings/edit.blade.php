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
    <form action="{{ route('settings.update', $row) }}" method="POST" role="form" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>@lang('custom.site_name')</label>
                <input type="text" value="{{ $row->site_name }}" name="site_name" class="form-control">
            </div>

            <div class="form-group">
                <label>@lang('custom.site_image')</label>
                <input type="file" name="site_image" class="form-control image">
            </div>

            <div class="form-group">
                <img src="{{ asset('storage/'. $row->site_name) }}" class="img-thumbnail image-preview" alt=""
                    style="width:250px; height:200px">
            </div>


            <div class="form-group">
                <label>@lang('custom.facebook')</label>
                <input type="text" value="{{ $row->facebook }}" name="facebook" class="form-control">
            </div>

            <div class="form-group">
                <label>@lang('custom.instagram')</label>
                <input type="text" value="{{ $row->instagram }}" name="instagram" class="form-control">
            </div>

            <div class="form-group">
                <label>@lang('custom.twitter')</label>
                <input type="text" value="{{ $row->twitter }}" name="twitter" class="form-control">
            </div>


            <div class="form-group">
                <label>@lang('custom.our_contact_number')</label>
                <input type="text" value="{{ $row->our_contact_number }}" name="our_contact_number"
                    class="form-control">
            </div>



            <div class="form-group">
                <label >@lang('custom.description')</label>
                <textarea name="site_description" class="ckeditor form-control" id="" cols="30" rows="10">{{ $row->site_description }}</textarea>
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
                        {{ $state->name }}</option>
                    @endforeach
                </select>

            </div>

            {{-- <div class="form-group ">
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
@include('custom-auth.ajax')
@include('front-end._session')
@endpush
@endsection