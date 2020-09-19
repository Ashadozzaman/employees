
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Info List</title>
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
        <a href="{{route('employeeInfo.create')}}"><button>Add Employee Info</button></a>
          <a href="{{route('company.index')}}"><button>Company</button></a>
          <a href="{{route('employee.index')}}"><button>Employee </button></a>

        @include('_message')
         <table class="table border">
            <thead>
              <tr>
                <th>No</th>
                <th>Birthday</th>
                <th>address</th>
                <th>Employee </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employeeInfo as $employee)
              <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->birthday}}</td>
                <td>{{$employee->address}}</td>
                @foreach($employees as $item)
                @if($item->id == $employee->employee_id)
                <td>{{$item->name}}</td>
                @endif
                @endforeach
                <td>
                  <a href="{{route('employeeInfo.edit',$employee->id)}}">
                    <button class="btn btn-success btn-sm">Edit</button>
                  </a>
                  <form action="{{ route('employeeInfo.destroy',$employee->id)}}" method="post">
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