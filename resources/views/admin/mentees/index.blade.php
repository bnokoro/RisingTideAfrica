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
            <h4 class="page-title">Mentee</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="#">Mentee</a></li>
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
                        <th>Mentorship Category</th> 
                        <th>Mentorship Stage</th>
                        <th>Day Choosen</th>
                        <th>Time Choosen</th>
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
                            <td>{{$user->mentee_stage}}</td>
                            <td>{{$user->day_choosen}}</td>
                            <td>{{$user->time_choosen}}</td>
                            <td style="text-align: center">
                                <a href="#" class="btn btn-info btn-sm">
                                    View
                                </a> |
                            <button
                             class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                            data-toggle="modal"
                             data-url="/mentee/{{$user->id}}"
                            data-target="#delete-mentee">
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

    @include('admin.mentees.partials._delete')

</div>

@stop

