<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="text-center">
		  <h3>Create Employee</h3>
		  <div class="col-md-10">
		  	<form action="{{ route('employee.store')}}" method="post" enctype="multipart/form-data">
		  		@csrf
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Name </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<input type="text" name="name" id="name" class="form-control" placeholder="Enter name here..">
			   	<div class="text-danger" id="name_error" style="text-align: initial;"> </div>
			   	
		  		@error('name')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Email</label>
		  		</div>
			   
			   <div class="form-group col-md-6">
			   	<input type="text" name="email" id="email" class="form-control" placeholder="Enter email here..">
			   	<div class="text-danger" id="email_error" style="text-align: initial;"> </div>

		  		@error('email')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Company </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<select name="companyId" id="companyId" class="form-control">
			   		<option value="">Select Option</option>
			   		@foreach($companies as $company)
			   			<option value="{{$company->id}}">{{$company->company_name}}</option>
			   		@endforeach
			   	</select>
			   	<div class="text-danger" id="companyId_error" style="text-align: initial;"> </div>
		  		@error('companyId')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
			   <div class="form-group col-md-9">
		  		<button class="btn btn-info" id="add_employee" type="submit">Save</button>
		  		<a class="btn btn-success" href="{{route('employee.index')}}">Back</a>	  	
			   </div>
		  	</div>
		  		
		  	</form>
		</div>
	</div>
	<script>
		$(function(){
			$('#add_employee').click(function(){
				let employeeDetails = {
					name      : $('#name').val(),
					email     : $('#email').val(),
					companyId : $('#companyId').val(),
				};
				if (employeeDetails.name == '' ) {
                    $('#name_error').html('Please provide your name');
                    return false;
                }else{
                    $('#name_error').html('');

                }

                if (employeeDetails.email == '' ) {
                    $('#email_error').html('Please provide your email');
                    return false;
                }else{
                    $('#email_error').html('');

                }
                if (employeeDetails.companyId == '' ) {
                    $('#companyId_error').html('Please provide your company name');
                    return false;
                }else{
                    $('#companyId_error').html('');

                }
			});
		});
	</script>
</body>