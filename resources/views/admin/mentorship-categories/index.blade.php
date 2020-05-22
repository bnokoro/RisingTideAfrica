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
                <h4 class="page-title">Mentorship Categories
                    <a href="/mentorship-categories/create"
                       class="btn btn-primary btn-sm pull-right">
                        <i class="fa fa-plus"></i>
                        Add Mentorship Category
                    </a>
                </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Mentorship Categories</a></li>
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
                        <th width="100">Mentorship Category</th>
                        <th width="180">Action</th>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$sn++}}
                                </td>

                                <td>
                                    {{$category->name}}
                                </td>

                                <td>
                                    <a href="/mentorship-categories/{{$category->id}}/edit"
                                       class="btn btn-info btn-sm">
                                        Edit
                                    </a> |
                                    <button
                                        class="btn btn-danger btn-sm waves-effect waves-light delete-button"
                                        data-toggle="modal"
                                        data-url="/mentorship-categories/{{$category->id}}"
                                        data-target="#delete-mentorship-category">
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

        @include('admin.mentorship-categories.partials._delete')

    </div>



@stop
