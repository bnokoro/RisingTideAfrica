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
            <div class="page-title-box"><h4 class="page-title">{{ $stage ? 'Edit' : 'Add' }} Mentee Stage</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/mentee-stages">Mentee Stages</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $stage ? 'Edit' : 'Add' }} Mentee Stage</a></li>
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

                                 @if ($stage)
                                    @method('patch')
                                @endif 

                                <div class="form-group">
                                    <label for="">Mentee Stage</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter a stage" required value="{{$stage ? $stage->name : ''}}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ $stage ? 'Update' : 'Submit' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop
