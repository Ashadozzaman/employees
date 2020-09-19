<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Companies;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employee::with(['company'])->orderBy('id')->get();
        $data['companies'] = Companies::orderBy('id')->get();
        // dd($data);
        return view('employee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = Companies::orderBy('id')->get();
        return view('employee.create',$data);
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
            'name' => 'required',
            'email' => 'required|email',
            'companyId' => 'required',
        ]);
        $data = $request->except(['_token']);
        // dd($data);
        Employee::create($data);
        session()->flash('message','Employee Create Successfully!!');
        return redirect()->route('employee.index');

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
        $data['employee'] = Employee::findOrFail($id);
        $data['companies'] = Companies::orderBy('id')->get();
        return view('employee.edit-employee',$data);
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
            'name' => 'required',
            'email' => 'required|email',
            'companyId' => 'required',
        ]);
        $data = $request->except(['_token']);
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        session()->flash('message','Employee Update Successfully!!');
        return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->destroy($id);
        session()->flash('message','Employee Delete Successfully!!');
        return redirect()->route('employee.index');
    }
}
