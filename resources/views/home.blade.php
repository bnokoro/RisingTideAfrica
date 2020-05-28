@extends('backend.content_layout')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Welcome to Rising Tide Africa Dashboard
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-users float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Mentors</h6>
                         <h4 class="mb-4">{{$mentors}}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-users float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Mentee</h6>
                         <h4 class="mb-4">{{$mentees}}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-users float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Users</h6>
                         <h4 class="mb-4">{{$users}}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-users float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Admins</h6>
                         <h4 class="mb-4">{{$admins}}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
