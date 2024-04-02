<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Models\Location\DepLocation;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    public function index(){
        $emp = Employee::all();
        // dd($emp);
        return view('layouts.pages.admin.employees.index',compact('emp'));
    }

    public function create(){
        $dept = Department::all();

        $loca = DepLocation::all();
        // dd($loca);
        return view('layouts.pages.admin.employees.create',compact('dept','loca'));
    }
    public function store(Request $request){
        $validated=$request -> validate([
            'emp_name'=> 'required|max:255',

        ]);

        $data = new Employee();
        $data->emp_name  = $request->emp_name;
        $data->emp_code  = $request->emp_code;
        $data->emp_desig  = $request->emp_desig;
        $data->cont_number  = $request->cont_number;
        $data->email  = $request->email;
        $data->date_of_birth  = $request->date_of_birth;
        $data->emp_gender  = $request->emp_gender;
        $data->nid_no  = $request->nid_no;
        $data->blood_group  = $request->blood_group;
        $data->status  = $request->status;
        $data->dept_id  = $request->dept_id;
        $data->loc_id  = $request->loc_id;
        $data->user_id     = Auth::user()->id;
        $data->save();

        $notification = array('messege' => 'Employee Save Successfully.', 'alert-type' => 'success');
        return redirect()->route('employee.index', compact('data'))->with($notification);
    }

    public function show($id){
        $data = Employee::find($id);
        return view('layouts.pages.admin.employees.show', compact('data'));
    }

    public function edit($id){
        $data = Employee::find($id);
        $dept_name = Department::all();
        $loca_name = DepLocation::all();
        return view('layouts.pages.admin.employees.edit',compact('data','dept_name','loca_name'));
    }

    public function update(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->emp_name  = $request->emp_name;
        $data->emp_code  = $request->emp_code;
        $data->emp_desig  = $request->emp_desig;
        $data->cont_number  = $request->cont_number;
        $data->email  = $request->email;
        $data->date_of_birth  = $request->date_of_birth;
        $data->emp_gender  = $request->emp_gender;
        $data->nid_no  = $request->nid_no;
        $data->blood_group  = $request->blood_group;
        $data->status  = $request->status;
        $data->dept_id  = $request->dept_id;
        $data->loc_id  = $request->loc_id;
        $data->user_id     = Auth::user()->id;
        $data->save();
        $notification = array('messege' => 'Employee Updated Successfully.', 'alert-type' => 'success');
        return redirect()->route('employee.index', compact('data'))->with($notification);
    }
}
