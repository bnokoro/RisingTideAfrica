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
            <div class="page-title-box"><h4 class="page-title">{{ $admin ? 'Edit' : 'Add' }} Admin</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/admins">Admins</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $admin ? 'Edit' : 'Add' }} Admin</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <form action="{{$action}}" method="post">
                        @csrf

                        @if ($admin)
                            @method('patch')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name"
                                           required value="{{optional($admin)->first_name}}">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name"
                                            required value="{{optional($admin)->last_name}}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="Email Address"
                                           required value="{{optional($admin)->email}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <input type="hidden" name="user_id" value="{{optional($admin)->id}}">

                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary btn-sm">{{ $admin ? 'Update' : 'Submit' }}</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@stop
