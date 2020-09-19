<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Employee Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="text-center">
		  <h3>Create Employee Info</h3>
		  <div class="col-md-10">
		  	<form action="{{ route('employeeInfo.store')}}" method="post" enctype="multipart/form-data">
		  		@csrf
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Birthday </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<input type="date" name="birthday" id="birthday" class="form-control" placeholder="Enter birthday here..">
			   	<div class="text-danger" id="birthday_error" style="text-align: initial;"> </div>
			   	
		  		@error('birthday')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Address</label>
		  		</div>
			   
			   <div class="form-group col-md-6">
			   	<input type="text" name="address" id="address" class="form-control" placeholder="Enter address here..">
			   	<div class="text-danger" id="address_error" style="text-align: initial;"> </div>

		  		@error('address')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Employee </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<select name="employee_id" id="employee_id" class="form-control">
			   		<option value="">Select Option</option>
			   		@foreach($employees as $employee)
			   			<option value="{{$employee->id}}">{{$employee->name}}</option>
			   		@endforeach
			   	</select>
			   	<div class="text-danger" id="employee_id_error" style="text-align: initial;"> </div>
		  		@error('employee_id')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
			   <div class="form-group col-md-9">
		  		<button class="btn btn-info" id="add_employee_info" type="submit">Save</button>
		  		<a class="btn btn-success" href="{{route('employeeInfo.index')}}">Back</a>	  	
			   </div>
		  	</div>
		  		
		  	</form>
		</div>
	</div>
	<script>
		$(function(){
			$('#add_employee_info').click(function(){
				let employeeDetails = {
					birthday      : $('#birthday').val(),
					address     : $('#address').val(),
					employee_id : $('#employee_id').val(),
				};
				if (employeeDetails.birthday == '' ) {
                    $('#birthday_error').html('Please provide your birthday');
                    return false;
                }else{
                    $('#birthday_error').html('');

                }

                if (employeeDetails.address == '' ) {
                    $('#address_error').html('Please provide your address');
                    return false;
                }else{
                    $('#address_error').html('');

                }
                if (employeeDetails.employee_id == '' ) {
                    $('#employee_id_error').html('Please provide your employee name');
                    return false;
                }else{
                    $('#employee_id_error').html('');

                }
			});
		});
	</script>
</body>