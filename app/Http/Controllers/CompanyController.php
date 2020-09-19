<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Companies::orderBy('id')->get();
        // dd($data);
        return view('companies.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');

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
            'company_name' => 'required',
            'address' => 'required',
        ]);
        $data = $request->except(['_token']);
        // dd($data);
        Companies::create($data);
        session()->flash('message','Company Create Successfully!!');
        return redirect()->route('company.index');
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
        $data['company'] = Companies::findOrFail($id);
        return view('companies.edit-company',$data);
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
            'company_name' => 'required',
            'address' => 'required',
        ]);
        $data = $request->except(['_token']);
        // dd($data);
        $company = Companies::findOrFail($id);
        $company->update($data);
        session()->flash('message','Company Update Successfully!!');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $company = Companies::findOrFail($id);
        $company->destroy($id);
        session()->flash('message','Company Update Successfully!!');
        return redirect()->route('company.index');
    }
}
