@extends('backend.content_layout')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">
                    Admins
                    <a href="/admin/admins/create" class="btn btn-primary btn-sm waves-effect waves-light pull-right">
                        <i class="fa fa-plus"></i>
                        Add Admin
                    </a>
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Admins</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">

                        <thead>
                        <th width="10">S.No</th>
                        <th>Name</th>
                        <th width="100">Email</th>
                        <th width="150">Created At</th>
                        <th width="180">Action</th>
                        </thead>

                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{$sn++}}
                                </td>

                                <td>
                                    {{$admin->name }}
                                </td>

                                <td>
                                    {{$admin->email}}
                                </td>

                                <td>
                                    {{ $admin->created_at->diffForHumans() }}
                                </td>

                                <td>
                                    <a href="/admin/admins/{{$admin->id}}/edit"
                                       class="btn btn-info btn-sm">
                                        Edit
                                    </a>
                                    {{-- @if($admin->id != auth()->id())
                                     @endif --}}
                                      <button
                                            class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                            data-toggle="modal"
                                            data-url="/admin/admins/{{$admin->id}}"
                                            data-target="#delete-admin">
                                            Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        @include('admin.admins.partials._delete')

    </div>



@stop
