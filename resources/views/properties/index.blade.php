@extends('admins.partials.main')
@section('content')

<div class="content-wrapper">       
     <div class="content-header"">
            <h3 class="">{{ $title }}  <a href="{{ route('properties.create') }}" class="btn btn-primary">@lang('custom.add')</a></h3>
            <div class="pull-right">
                <form action="{{ route('properties.index') }}"> 
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
                        <th>@lang('custom.featured')</th>
                        <th>@lang('custom.user')</th>
                        <th>@lang('custom.seller_role')</th>
                        <th>@lang('custom.price')</th>
                        <th>@lang('custom.will_be_available_on')</th>
                        <th>@lang('custom.furniture')</th>
                        <th>@lang('custom.status')</th>
                        <th>@lang('custom.payment_method')</th>
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
                        <td>{{ $row->name }}</td>
                        <td><img style="width:50px; height:50px" src="{{ $row->featured() }}" ></td>
                        <td>{{ $row->user->fullName() }}</td>
                        <td>{{ ucwords($row->seller_role) }}</td>
                        <td>{{ $row->price() }}</td>
                        <td>{{ $row->will_be_available_on }}</td>
                        <td>{{ ucwords($row->furniture) }}</td>
                        <td>{{ ucwords($row->status) }}</td>
                        <td>{{ ucwords($row->payment_method) }}</td>
                        <td>{{ $row->created_at->format('d-m-Y h:i') }}</td>
                        <td>{{ $row->updated_at->format('d-m-Y h:i') }}</td>
                        <td><a href="{{ route('properties.edit', $row) }}" class="btn btn-primary"> <i class="fa fa-edit"></i></a></td>
                        <td>
                            <form action="{{ route('properties.destroy', $row) }}" method="POST">
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