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
    <form action="{{ route('states.store') }}" method="POST"   role="form" enctype="multipart/form-data">

        @csrf
        <div class="box-body">
            <div class="form-group">
                <label >@lang('custom.state_name')</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label >@lang('custom.city')</label>

                <select name="city_id" id="" class="form-control">
                    <option>.....................</option>

                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label >@lang('custom.state_view')</label>
                <input type="file"  name="main_image" class="form-control image">
            </div>
            <div class="form-group">
                <img src="{{ asset('4.png')}}" class="img-thumbnail image-preview" alt="" style="width:250px; height:200px">
            </div>


            <div >
                <button type="submit" class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">{{ $title }}</button>
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
            
        @include('front-end._session')
    @endpush
@endsection