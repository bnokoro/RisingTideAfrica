@extends('frontend.layouts.app')

@section('content')

    @if(session()->has('success'))
        <div class="alert session-alert alert-primary">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert session-alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="wrap-contact100">
        <form class="contact100-form validate-form" method="post" action="mentees">
            @csrf
            <span class="contact100-form-title">
                Mentees Sign Up!
            </span>

            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">First Name</span>
                <input class="input100" type="text" name="first_name" placeholder="Enter your first name">
                <span class="focus-input100"></span>
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="wrap-input100 validate-input" data-validate="Midddle Name is required">
                <span class="label-input100">Middle Name</span>
                <input class="input100" type="text" name="middle_name" placeholder="Enter your middle name">
                <span class="focus-input100"></span>
                @error('middle_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                <span class="label-input100">Last Name</span>
                <input class="input100" type="text" name="last_name" placeholder="Enter your last name">
                <span class="focus-input100"></span>
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="wrap-input100 validate-input" data-validate="Phone Number is required">
                <span class="label-input100">Phone Number</span>
                <input class="input100" type="text" name="phone"
                       placeholder="Enter your phone number">
                <span class="focus-input100"></span>
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Email is required">
                <span class="label-input100">Email</span>
                <input class="input100" type="email" name="email" placeholder="Enter your email address">
                <span class="focus-input100"></span>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="wrap-input100 input100-select">
                <span class="label-input100">Mentorship Categories</span>
                <div>
                    <select class="selection-2" name="category_id" required>
                        <option>Choose Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <span class="focus-input100"></span>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="wrap-input100 input100-select">
                <span class="label-input100">Mentorship Stages</span>
                <div>
                    <select class="selection-2 mentorship-stage-select" name="stage_id" required>
                        <option value="">Choose Stages</option>
                        @foreach($stages as $stage)
                            <option value="{{$stage->id}}">{{$stage->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="stage-error">Selected stage has no mentor. Please select another stage</span>
                </div>
                <span class="focus-input100"></span>
                @error('stage_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="input100-select ">
                <span class="label-input100">Day Available to be Mentored</span>
                <div id="datepicker" class="input-group date day_choosen_mentee" data-date-format="mm-dd-yyyy">
                    <input class="form-control" name="day_choosen" type="text" readonly/>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <span id="date-error" class="date-error text-danger">Slot is occupied. Choose another date.</span>
                </div>
                <span class="focus-input100"></span>
                @error('day_choosen')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <input type="hidden" name="selected_date" id="selected_date_input">

            <div class="wrap-input100 input100-select">
                <span class="label-input100">Time Available to be Mentored</span>
                <input class="input100" type="text" name="time_choosen" required readonly>
                <span class="focus-input100"></span>
                @error('time_choosen')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button type="submit" class="contact100-form-btn mentee-submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
