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
            <div class="page-title-box"><h4 class="page-title">{{ $time ? 'Edit' : 'Add' }} Time</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/time-setting">Time</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $time ? 'Edit' : 'Add' }} Time</a></li>
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

                                @if ($time)
                                    @method('patch')
                                @endif

                                <div class="form-group">
                                    <label for="">Start time</label>
                                    <input class="form-control" type="text" name="start_time" placeholder="e.g 5pm" required value="{{optional($time)->start_time}}">
                                    @error('start_time')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">End time</label>
                                    <input class="form-control" type="text" name="end_time" placeholder="e.g 6pm" required value="{{optional($time)->end_time}}">
                                    @error('end_time')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ $time ? 'Update' : 'Submit' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop
