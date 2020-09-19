<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeInfo;

use Illuminate\Http\Request;

class EmployeeInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employeeInfo'] = EmployeeInfo::orderBy('id')->get();
        $data['employees']    = Employee::orderBy('id')->get();
        // dd($data);
        return view('employee-info.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = Employee::orderBy('id')->get();
        return view('employee-info.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'birthday' => 'required',
            'address' => 'required',
            'employee_id' => 'required|unique:employee_infos',
        ]);
        $data = $request->except(['_token']);
        // dd($data);
        EmployeeInfo::create($data);
        session()->flash('message','Employee Info Create Successfully!!');
        return redirect()->route('employeeInfo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employee'] = EmployeeInfo::findOrFail($id);
        $data['employees'] = Employee::orderBy('id')->get();
        return view('employee-info.edit-employee-info',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'birthday' => 'required',
            'address' => 'required',
            'employee_id' => 'required',
        ]);
        $data = $request->except(['_token']);
        $employee = EmployeeInfo::findOrFail($id);
        $employee->update($data);
        session()->flash('message','Employee Info Update Successfully!!');
        return redirect()->route('employeeInfo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = EmployeeInfo::findOrFail($id);
        $employee->destroy($id);
        session()->flash('message','Employee Info Delete Successfully!!');
        return redirect()->route('employeeInfo.index');
    }
}
