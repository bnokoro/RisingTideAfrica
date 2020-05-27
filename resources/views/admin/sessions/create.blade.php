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
            <div class="page-title-box"><h4 class="page-title">{{ $session ? 'Edit' : 'Add' }} Session</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/sessions">Sesison</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $session ? 'Edit' : 'Add' }} Session</a></li>
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

                                @if ($session)
                                    @method('patch')
                                @endif

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter session title" required value="{{optional($session)->name}}">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Start date</label>
                                    <input class="form-control" type="date" name="start_date" placeholder="Choose Start Date" required value="{{optional($session)->start_date}}">
                                    @error('start_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">End date</label>
                                    <input class="form-control" type="date" name="end_date" placeholder="Choose End Date" required value="{{optional($session)->end_date}}">
                                    @error('end_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="display: block" for="">Activate</label>
                                    <label><input type="radio" class="form-check-inline" name="active" value="0"
                                                  {{$session ? ($session->active == 0 ? 'checked' : '') : 'checked'}}>No</label> &nbsp;
                                    <label><input type="radio" class="form-check-inline" name="active" value="1" {{$session ? ($session->active == 1 ? 'checked' : '') : ''}}>Yes</label>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ $session ? 'Update' : 'Submit' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop
