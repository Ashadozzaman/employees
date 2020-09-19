
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
      <div class="">
        <h3>Employees List</h3>
        <a href="{{route('employee.create')}}"><button>Add Employee</button></a>
          <a href="{{route('company.index')}}"><button>Company</button></a>
          <a href="{{route('employeeInfo.index')}}"><button>Employee Info</button></a>

        @include('_message')
         <table class="table border">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                @foreach($companies as $company)
                @if($company->id == $employee->companyId)
                <td>{{$company->company_name}}</td>
                @endif
                @endforeach
                <td>
                  <a href="{{route('employee.edit',$employee->id)}}">
                    <button class="btn btn-success btn-sm">Edit</button>
                  </a>
                  <form action="{{ route('employee.destroy',$employee->id)}}" method="post">
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