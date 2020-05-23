		
 @extends('frontend.layouts.app')

 @section('content')

 		@if($errors->any())
		<div class="alert alert-danger">
			<ul class="list-group">
				@foreach($errors->all() as $error)
				<li class="list-group-item text-danger">
					{{$error}}
				</li>
				@endforeach 

			</ul>
		</div>
		@endif 
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" action="mentors">
				@csrf
				<span class="contact100-form-title">
					Mentors!
				</span>

				<div class="wrap-input100 validate-input" data-validate="Email is required">
					<span class="label-input100">Email</span>
					<input required class="input100" type="email" name="email" id="mentor-email" placeholder="Enter your email address">
					<span class="focus-input100"></span>
				</div>
				
				 <div class="wrap-input100 validate-input other-inputs" data-validate="Name is required">
					<span class="label-input100">First Name</span>
					<input class="input100" type="text" name="first_name" placeholder="Enter your first name">
					<span class="focus-input100"></span>
				</div> 


				<div class="wrap-input100 validate-input other-inputs" data-validate="Last Name is required">
					<span class="label-input100">Last Name</span>
					<input class="input100" type="text" name="last_name" placeholder="Enter your last name">
					<span class="focus-input100"></span>
				</div>



				<div class="wrap-input100 validate-input other-inputs" data-validate="Phone Number is required">
					<span class="label-input100">Phone Number</span>
					<input class="input100" type="text" name="phone" other-inputname="name" placeholder="Enter your phone number">
					<span class="focus-input100"></span>
				</div>  

				<div class="wrap-input100 input100-select other-inputs">
					<span class="label-input100">Mentorship Categories</span>
					<div>
						<select class="selection-2" name="category_id">
							<option>Choose Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="input100-select other-inputs">
					<span class="label-input100">Day Available to Mentor</span>
					<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
							<input class="form-control" name="day_choosen" type="text" readonly />
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select other-inputs">
					<span class="label-input100">Time Available to Mentor</span>
					<div>
						<select class="selection-2" name="time_choosen">
							{{-- <option>Choose Time</option> --}}
							{{-- <option value="5">5 &mdash; 6pm </option> --}}
							<option value="6">5 &mdash; 7pm </option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>


				<div class="container-contact100-form-btn other-inputs">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection
