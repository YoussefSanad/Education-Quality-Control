<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Collage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collageId = session()->get('selectedCollage')->id;
        $employees = Collage::find($collageId)->employees;
        return view('employee.employees')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
        $employee = new Employee;
        $employee ->collage_id = session()->get('selectedCollage')->id;
        $employee ->name = $request->input('name');
        $employee ->phone = $request->input('phone');
        $employee ->address = $request->input('address');
        $employee ->save();
        return redirect('employees/create')->with('success' , 'Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee', $employee);
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
        $this->validate($request,
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
        $employee = Employee::find($id);
        $employee ->name = $request->input('name');
        $employee ->phone = $request->input('phone');
        $employee ->address = $request->input('address');
        $employee ->save();
        return redirect('employees')->with('success' , 'Employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        return redirect('/employees')->with('success' , 'Employee deleted');
    }
}
