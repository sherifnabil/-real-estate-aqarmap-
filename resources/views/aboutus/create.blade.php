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
    <form action="{{ route('aboutus.store') }}" method="POST"   role="form" enctype="multipart/form-data">

        @csrf
        <div class="box-body">
            <div class="form-group">
                <label >@lang('custom.title')</label>
                <input type="text" value="{{ old('title') }}" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label >@lang('custom.description')</label>
                <textarea name="description" class="ckeditor form-control" id="" cols="30" rows="10"></textarea>
            </div>


            <div >
                <button type="submit" class="btn btn-primary pull-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}">{{ $title }}</button>
            </div>
        </div>
        <!-- /.box-body -->

    </form>

    @push('js')
        <script src="/noty/noty.min.js"></script>
        <script src="/ckeditor/ckeditor.js"></script>
            
        @include('front-end._session')
    @endpush
@endsection