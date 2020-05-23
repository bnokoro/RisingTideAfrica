@extends('backend.content_layout')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Mentors</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="#">Mentors</a></li>
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
                        <th>Day Choosen</th>
                        <th>Time Choosen</th>
                        <th>Mentorship Category</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach($mentors as $mentor)
                        <tr>
                            <td>{{$sn++}}</td>
                            <td>{{$mentor['first_name' ]. ' ' . $mentor['last_name'] }}</td>
                            <td>{{$mentor['email']}}</td>
                            <td>{{$mentor['phone']}}</td>
                            <td>{{$mentor['day_choosen']}}</td>
                            <td>{{$mentor['time_choosen']}}</td>
                            <td>{{$mentor['category_id']}}</td>
                            
                            <td style="text-align: center">
                                <a href="#" class="btn btn-info btn-sm">
                                    View
                                </a> |
                            <button
                             class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                            data-toggle="modal"
                             data-url="/mentor/{{$mentor['id']}}"
                            data-target="#delete-mentor">
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

    @include('admin.mentors.partials._delete')

</div>

@stop

