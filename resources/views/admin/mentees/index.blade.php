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
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Mentorship Category</th>
                        <th>Mentorship Stages</th>
                        <th>Mentorship Day</th>
                        <th>Mentorship Time</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$sn++}}</td>
                            <td>{{$user->first_name . ' ' . $user->last_name . ' ' . $user->middle_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->mentorship_category}}</td>
                            <td>{{$user->mentorship_stage}}</td>
                            <td>{{$user->mentorship_day}}</td>
                            <td>{{$user->mentorship_time}}</td>
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