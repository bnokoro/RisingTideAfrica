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
                <h4 class="page-title">Mentee</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                        <th>Day Choosen</th>
                        <th>Time Choosen</th>
                        <th>Mentorship Category</th>
                        <th>Mentorship Stage</th>
                        <th>Company Profile Upload</th>
                        <th>Actions</th>
                        </thead>

                        <tbody>
                        @foreach($mentees as $mentee)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td>{{$mentee['first_name'] . ' ' . $mentee['last_name'] }}</td>
                                <td>{{$mentee['email']}}</td>
                                <td>{{$mentee['phone']}}</td>
                                <td>{{$mentee['day_choosen']}}</td>
                                <td>{{$mentee['time_selected']}}</td>
                                <td>{{$mentee['category'] ? $mentee['category']['name'] : ''}}</td>
                                <td>{{$mentee['stage'] ? $mentee['stage']['name'] : ''}}</td>
                                <td><a target="_blank" id="mentee-company-file" href="{{$mentee['company_file_url']}}">Download File</a></td>

                                <td style="text-align: center">
                                    <button
                                        class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                        data-toggle="modal"
                                        data-url="/admin/mentees/{{$mentee['id']}}"
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

