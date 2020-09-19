<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="text-center">
		  <h3>Edit Company</h3>
		  <div class="col-md-10">
		  	<form action="{{ route('company.update',$company->id)}}" method="post" enctype="multipart/form-data">
		  		@csrf
                @method('put')
		  	<div class="row">
		  		<div class="col-md-4">
		  			<label>Company Name </label>
		  		</div>
			   <div class="form-group col-md-6">
			   	<input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $company->company_name)}}">

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
			   	<input type="text" name="address" id="address" class="form-control" value="{{ old('address', $company->address)}}">

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
		  		<button class="btn btn-info" id="edit_company" type="submit">Save</button>	  	
		  		<a class="btn btn-info"  href="{{route('company.index')}}">Back</a>   	
			   </div>
		  	</div>
		  		
		  	</form>
		</div>
	</div>
	<script>
		$(function(){
			$('#edit_company').click(function(){
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
	<!-- ckeditor start -->
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script>
	    CKEDITOR.replace( 'description' );
	</script>
	<!-- endckeditor -->
</body>