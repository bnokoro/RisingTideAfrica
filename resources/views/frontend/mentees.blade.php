@extends('frontend.layouts.app')

 @section('content')

 
	 <div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Mentees!
				</span>

				 <div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">First Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter your first name">
					<span class="focus-input100"></span>
				</div> 

				
				<div class="wrap-input100 validate-input" data-validate="Midddle Name is required">
					<span class="label-input100">Middle Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter your middle name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Last Name is required">
					<span class="label-input100">Last Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter your last name">
					<span class="focus-input100"></span>
				</div>



				<div class="wrap-input100 validate-input" data-validate="Phone Number is required">
					<span class="label-input100">Phone Number</span>
					<input class="input100" type="text" name="name" placeholder="Enter your phone number">
					<span class="focus-input100"></span>
				</div>  

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter your email addess">
					<span class="focus-input100"></span>
				</div>

			
				<div class="wrap-input100 input100-select">
					<span class="label-input100">Mentorship Categories</span>
					<div>
						<select class="selection-2" name="service">
							<option>Choose Category</option>
							<option>Finance</option>
							<option>Health</option>
							<option>Education</option>
							<option>IT</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 input100-select">
					<span class="label-input100">Mentorship Stages</span>
					<div>
						<select class="selection-2" name="service">
							<option>Choose Stage</option>
							<option>Idea Stage</option>
							<option>Seed Stage</option>
							<option>Growth Stages</option>
							<option>Development Stage</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
			
				<div class="input100-select">
					<span class="label-input100">Day to be Mentored</span>
					<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
							<input class="form-control" type="text" readonly />
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Time to be Mentored</span>
					<div>
						<select class="selection-2" name="service">
							<option>Choose Time</option>
							<option>5 &mdash; 6pm </option>
							<option>5 &mdash; 7pm </option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
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
