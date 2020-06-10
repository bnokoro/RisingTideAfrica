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
                    Time Settings
                    <a href="/admin/time-setting/create" class="btn btn-primary btn-sm waves-effect waves-light pull-right">
                        <i class="fa fa-plus"></i>
                        Add Time
                    </a>
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Time Settings</a></li>
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
                        <th width="100">Start Date</th>
                        <th width="150">End Date</th>
                        <th width="180">Action</th>
                        </thead>

                        <tbody>
                        @foreach($times as $time)
                            <tr>
                                <td>
                                    {{$sn++}}
                                </td>

                                <td>
                                    {{$time->start_time}}
                                </td>

                                <td>
                                    {{ $time->end_time }}
                                </td>

                                <td>
                                    <a href="/admin/time-setting/{{$time->id}}/edit"
                                       class="btn btn-info btn-sm">
                                        Edit
                                    </a> |
                                    <button
                                        class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                        data-toggle="modal"
                                        data-url="/admin/time-setting/{{$time->id}}"
                                        data-target="#delete-time-setting">
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

        @include('admin.times._delete')

    </div>



@stop
