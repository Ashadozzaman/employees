
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Companies List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
      <div class="">
        <h3>Companies List</h3>
        <a href="{{route('company.create')}}"><button>Add Company</button></a>
        <a href="{{route('employee.index')}}"><button>Employee</button></a>
        @include('_message')
         <table class="table border">
            <thead>
              <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $company)
              <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->company_name}}</td>
                <td>{{$company->address}}</td>
                <td>
                  <a href="{{route('company.edit',$company->id)}}">
                    <button class="btn btn-success btn-sm">Edit</button>
                  </a>
                  <form action="{{ route('company.destroy',$company->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Are you sure delete this?')" class="btn btn-danger btn-sm">Delete</button>

                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</body>