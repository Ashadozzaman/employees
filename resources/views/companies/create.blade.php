<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="text-center">
		  <h3>Create Company</h3>
		  <div class="col-md-10">
		  	<form action="{{ route('company.store')}}" method="post" enctype="multipart/form-data">
		  		@csrf
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Company Name </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter company name here..">
			   	<div class="text-danger" id="company_name_error" style="text-align: initial;">
	            </div>
		  		@error('company_name')
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
			   	<div class="text-danger" id="address_error" style="text-align: initial;">
	            </div>
		  		@error('address')
	            <div class="text-danger" style="text-align: initial;">
	            	{{ $message }}
	            </div>
	            @enderror
			   </div>				  	
		  	</div>
		  	<div class="row">
			   <div class="form-group col-md-9">
		  		<button class="btn btn-info" id="add_company" type="submit">Save</button>	  	
			   </div>
		  	</div>
		  		
		  	</form>
		</div>
	</div>
	<script>
		$(function(){
			$('#add_company').click(function(){
				let companyDetails = {
					company_name : $('#company_name').val(),
					address : $('#address').val(),
				};
				if (companyDetails.company_name == '' ) {
                    $('#company_name_error').html('Please provide your company name');
                    return false;
                }else{
                    $('#company_name_error').html('');

                }

                if (companyDetails.address == '' ) {
                    $('#address_error').html('Please provide your company address');
                    return false;
                }else{
                    $('#address_error').html('');

                }
			});
		});
	</script>
</body>