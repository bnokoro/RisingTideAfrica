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
                        {{-- <h4 class="mb-4">{{$mentor}}</h4> --}}
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
                        {{-- <h4 class="mb-4">{{$mentee}}</h4> --}}
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
                        {{-- <h4 class="mb-4">{{$user}}</h4> --}}
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
                        {{-- <h4 class="mb-4">{{$admin}}</h4> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-book float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Blogs</h6>
                        <h4 class="mb-4">{{$blogs}}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="fa fa-calendar float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Events</h6>
                        <h4 class="mb-4">{{$event_count}}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 m-b-30 header-title">Latest Events</h4>

                    <div class="table-responsive">
                        @if (count($recent_events) > 0)
                            <table class="table table-vertical mb-1">

                                <tbody>
                                @foreach($recent_events as $event)
                                <tr>
                                    <td>
                                        <img src="{{$event->image}}"
                                             alt="user-image" class="thumb-sm mr-2 rounded-circle">
                                        {{$event->title}}
                                    </td>
                                    <td>{{$event->type}}</td>
                                    <td>{{$event->date}}</td>
                                </tr>
                                @endforeach


                                </tbody>
                            </table>
                        @else
                            <span>No Events Yet!</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}
@endsection
