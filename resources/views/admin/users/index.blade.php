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
                <h4 class="page-title">Users</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Users</a></li>
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
                        <th width="100">Email Address</th>
                        <th>User Type</th>
                        {{-- <th width="150">Startup Type</th> --}}
                        <th width="180">Action</th>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$sn++}}
                                </td>

                                <td>
                                    {{$user['first_name'] . ' ' . $user['last_name'] }}
                                </td>

                                <td>
                                    {{$user['email']}}
                                </td>

                                <td>
                                    {{ $user['mentor']['mentee'] }}
                                </td>

                                {{-- <td>
                                    {{ $user['startup_type'] ? $user['startup_type']['startup_type'] : '' }}
                                </td> --}}

                                <td>
                                    <button
                                        class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                        data-toggle="modal"
                                        data-url="/admin/users/{{$user['id']}}"
                                        data-target="#delete-user">
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

        @include('admin.users.partials._delete')

    </div>



@stop
