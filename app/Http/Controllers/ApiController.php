<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Companies;
use DB;
use Validator;

class ApiController extends Controller
{
    public function get_employees(){
    	$data['employees'] = Employee::orderBy('id')->get();
    	return response()->json($data,200);
    }
    public function get_employee($id)
    {
        $data['employee'] = Employee::findOrFail($id);
        $data['companies'] = Companies::orderBy('id')->get();
        return response()->json($data,200);
    }

    public function get_companies(){
        $data['companies'] = Companies::orderBy('id')->get();
        return response()->json($data,200);
    }
    public function employee_details($id){
    	// $data['employee'] = Employee::with(['company','employeeInfo'])->where('id',$id)->orderBy('id')->get();

    	$data['employee'] = DB::table('employees')
            ->select('employees.id as employee_id','name', 'email','employee_infos.birthday as Birtday','companies.company_name as CompanyName' )
            ->join('companies', 'companies.id', '=', 'employees.companyId')
            ->join('employee_infos', 'employees.id', '=', 'employee_infos.employee_id')
            ->where('employees.id','=',$id)
            ->get();
    	return response()->json($data,200);
    }
//create employee post api
    public function createEmployee(Request $request)
    {
        $validator = Validator::make($request->all(),[
			'name' => 'required',
            'email' => 'required|email',
            'companyId' => 'required',
        ]);

        if ($validator->fails()) {
        	return response()->json(['error'=> $validator->messages()],404);
    		
    	}else{
	        $data = $request->except(['_token']);
	        // dd($data);
	        Employee::create($data);
	        return response()->json(['success'=>'Employee Create Successfully!!']);

    	}

    }

    public function editEmployee(Request $request,$id)
    {
    // dd($request->all());
    // return $request->all();
        $validator = Validator::make($request->all(),[
			'name' => 'required',
            'email' => 'required|email',
            'companyId' => 'required',
        ]);

        if ($validator->fails()) {
        	return response()->json(['error'=> $validator->messages()],404);    		
    	}else{
	        $data = $request->except(['_token']);
	        $employee = Employee::findOrFail($id);
        	$employee->update($data);
	        return response()->json(['success'=>'Employee Update Successfully!!']);
    	}

    }

    public function deleteEmployee($id){
        $employee = Employee::findOrFail($id);
        $employee->destroy($id);
        return response()->json(['success'=>'Employee delete Successfully!!']);
    }
    
}
