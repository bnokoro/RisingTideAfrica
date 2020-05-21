@extends('layouts.content_layout')
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
            <div class="page-title-box"><h4 class="page-title">{{ $category ? 'Edit' : 'Add' }} Blog Category</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/blog-categories">Blog Categories</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $category ? 'Edit' : 'Add' }} Blog Category</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{$action}}" method="post">
                                @csrf

                                @if ($category)
                                    @method('patch')
                                @endif

                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter a category" required value="{{$category ? $category->name : ''}}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ $category ? 'Update' : 'Submit' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop
