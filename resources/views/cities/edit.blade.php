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
        <form action="{{ route('cities.update', $row) }}" method="POST" role="form" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('custom.city_name')</label>
                    <input type="text" value="{{ $row->name }}" name="name" class="form-control">
                </div>

                <div class="form-group">

                    <label>@lang('custom.city_view')</label>
                    <input type="file" name="main_image" class=" image form-control">
                </div>

                <div class="form-group">
                    <img class="image-preview"  src="{{ asset('storage/' . $row->main_image) }}" style="width:250px; height:200px" >
                </div>
                <div>
                    <button type="submit"
                        class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">@lang('custom.update')</button>
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
            @include('front-end._session')
        @endpush
@endsection