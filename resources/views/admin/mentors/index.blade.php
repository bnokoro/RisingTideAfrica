@extends('layouts.content_layout')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Users
                <a href="{{ route('users.create') }}" class="btn btn-primary waves-effect waves-light float-right">Add User</a>
            </h4>
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
                <table class="table table-bordered" id="users-table">

                    <thead>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$sn++}}</td>
                            <td>{{$user->first_name . ' ' . $user->last_name . ' ' . $user->middle_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->user_type)
                                    @if ($user->user_type->user_type == 'investor')
                                        {{$user->investor_profile->phone}}
                                    @else
                                        {{$user->startup_profile->phone}}
                                    @endif
                                @endif
                            </td>
                            <td>{{$user->country->country}}</td>
                            <td>Startup</td>
                            <td style="text-align: center">
                                <a href="#" class="btn btn-info btn-sm">
                                    View
                                </a> |
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$user->id}})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function handleDelete(id) {

        var form = document.getElementById('deleteUsersForm')

        form.action = '/users/' + id

        console.log('deleting.', form)

        $('#deleteModal').modal('show')
    }

    $('#users-table').DataTable();
</script>

@endsection