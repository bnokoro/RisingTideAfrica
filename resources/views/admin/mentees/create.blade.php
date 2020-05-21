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
{{--Create Blogs Start --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box"><h4 class="page-title">{{ $user ? 'Edit' : 'Add' }} Mentee</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/admins">Mentee</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $user ? 'Edit' : 'Add' }}Mentee</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-body">


                            <form action="{{ isset($user) ? route('users.update', $user->id) :  route('users.store') }}" method="POST" enctype="multipart/form-data">
                        
                                    @csrf

                                     @if(isset($user))

                                    @method('PUT')

                                    @endif

                                    <div class="form-group">
  
                                        <label for="first_name">First Name</label>
                                         <input type="text" id="first_name" class="form-control" name="first_name" value="{{ isset ($user) ? $user->first_name : '' }}">
                                    
                                        <label for="last_name">Last Name</label>
                                         <input type="text" id="last_name" class="form-control" name="last_name" value="{{ isset ($user) ? $user->last_name : '' }}">
                                    
                                        <label for="middle_name">Middle Name</label>
                                         <input type="text" id="middle_name" class="form-control" name="middle_name" value="{{ isset ($user) ? $user->middle_name : '' }}">
                                    

                                        <label for="email">E-Mail</label>
                                         <input type="email" id="email" class="form-control" name="email" value="{{ isset ($user) ? $user->email : '' }}">
                                        
                                         {{-- <label for="email_verified_at">Verify E-Mail</label>
                                         <input type="email_verified_at" id="email_verified_at" class="form-control" name="email_verified_at" value="{{ isset ($user) ? $user->email_verified_at : '' }}">
                                     --}}


                                        {{-- <label for="phone">Phone Number</label>
                                         <input type="text" id="phone" class="form-control" name="phone" value="{{ isset ($user) ? $user->phone : '' }}">
                                     --}}
                                        <label for="password">Password</label>
                                         <input type="password" id="password" class="form-control" name="password" value="{{ isset ($user) ? $user->password : '' }}">
                                     

                                         <label for="country_id">Country ID</label>
                                         <input type="text" id="country_id" class="form-control" name="country_id" value="{{ isset ($user) ? $user->country_id : '' }}"> 
                                    
                                        
                                        <label for="startup_type_id">StartUp ID</label>
                                         <input type="text" id="startup_type_id" class="form-control" name="startup_type_id" value="{{ isset ($user) ? $user->startup_type_id : '' }}">
                                        
                                        
                                        {{-- <select class="form-control" id="startup_type_id" name="startup_type_id" value="{{ isset ($user) ? $user->startup_type_id : '' }}">
                                            <option>Select</option>
                                            <option>Female Owned</option>
                                            <option>Female Led</option>
                                            <option>Gender Bias</option>
                                        </select>  --}}

                                        <label for="user_type_id">User ID</label>
                                         <input type="text" id="user_type_id" class="form-control" name="user_type_id" value="{{ isset ($user) ? $user->user_type_id : '' }}">
                                        
                                         
                                        {{-- 
                                        <select class="form-control" id="user_type_id" name="user_type_id" value="{{ isset ($user) ? $user->user_type_id : '' }}">
                                            <option>Select</option>
                                            <option>Investor</option>
                                            <option>Startup</option>
                                         </select> --}}

                                                                           

                                    </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">
                                             {{ isset ($user) ? 'Update User' : 'Add User' }}
                                            </button>
                                        </div>
                            </form>
                            </div>
                        </div>
                                
                                
{{--Create Blogs End --}}
               
@endsection