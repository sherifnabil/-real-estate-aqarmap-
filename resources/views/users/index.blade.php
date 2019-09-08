@extends('admins.partials.main')
@section('content')

<div class="content-wrapper">       
     <div class="content-header"">
            <h3 class="">{{ $title }}  <a href="{{ route('users.create') }}" class="btn btn-primary">@lang('custom.add')</a></h3>
            <div class="pull-right">
                <form action="{{ route('users.index') }}"> 
                        <div class="input-group input -group-sm" style="width: 150px;">

                        
                        <input type="text" name="search" class="form-control pull-right" value="{{ request()->search }}" placeholder="{{ __('custom.search') }}">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
        <!-- /.box-header -->
        <div class=" table table-bordered no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('custom.name')</th>
                        <th>@lang('custom.email')</th>
                        <th>@lang('custom.user_type')</th>
                        <th>@lang('custom.phone')</th>
                        <th>@lang('custom.profile_image')</th>
                        <th>@lang('custom.address')</th>
                        <th>@lang('custom.created_at')</th>
                        <th>@lang('custom.updated_at')</th>
                        <th>@lang('custom.edit')</th>
                        <th>@lang('custom.delete')</th>
                    </tr>

                </thead>
                <tbody>
                    
                    @foreach ($rows as $row)
                    <tr>
                        
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->fullName() }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->userTypeName() }}</td>
                        <td>{{ $row->phone }}</td>
                        <td><img style="width:50px; height:50px" src="{{ $row->profilImage() }}" ></td>
                        <td>{{ $row->fullAddress() }}</td>
                        <td>{{ $row->created_at->format('d-m-Y h:i') }}</td>
                        <td>{{ $row->updated_at->format('d-m-Y h:i') }}</td>
                        <td><a href="{{ route('users.edit', $row) }}" class="btn btn-primary"> <i class="fa fa-edit"></i></a></td>
                        <td>
                            <form action="{{ route('users.destroy', $row) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">

                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">

            {{ $rows->appends(request()->query())->links() }}
        </div>
        <!-- /.box-body -->
    </div>


    @push('js')
    <script src="/noty/noty.min.js">
    </script>

    @include('front-end._session')
    @endpush
    @endsection