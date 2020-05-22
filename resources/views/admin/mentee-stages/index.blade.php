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
                <h4 class="page-title">Mentee Stages
                    <a href="/mentee-stages/create"
                       class="btn btn-primary btn-sm pull-right">
                        <i class="fa fa-plus"></i>
                        Add Mentee Stage
                    </a>
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Mentee Stages</a></li>
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
                        <th width="100">Mentee Stage</th>
                        <th width="180">Action</th>
                        </thead>

                        <tbody>
                        @foreach($stages as $stage)
                            <tr>
                                <td>
                                    {{$sn++}}
                                </td>

                                <td>
                                    {{$stage->name}}
                                </td>

                                <td>
                                    <a href="/mentee-stages/{{$stage->id}}/edit"
                                       class="btn btn-info btn-sm">
                                        Edit
                                    </a> |
                                    <button
                                        class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                        data-toggle="modal"
                                        data-url="/mentee-stages/{{$stage->id}}"
                                        data-target="#delete-mentee-stage">
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

        @include('admin.mentee-stages.partials._delete')

    </div>



@stop
