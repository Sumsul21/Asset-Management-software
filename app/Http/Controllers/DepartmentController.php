<?php

namespace App\Http\Controllers;

use App\Models\Department\Department;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DepartmentController extends Controller
{
    public function index(){
        $dept = Department::latest()->with('user')->get();
        // dd($data);

        return view('layouts.pages.department.index',compact('dept'));
    }
    public function create(){
        $data =User::orderBy('id','DESC')->where('status', 1)->get();
        // dd($data);
        return view('layouts.pages.department.create',compact('data'));
    }

    public function store(Request $request)
    {
        $validated=$request -> validate([
            'dept_name'=> 'required|max:255',
            'dept_head'=> 'required',
            'status'=> 'required',
        ]);


        $data = new Department();
        $data->dept_name = $request->dept_name;
        $data->dept_head = $request->dept_head;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        $notification = array('messege' => 'Department save successfully.', 'alert-type' => 'success');
        return redirect()->route('dep_det.index')->with($notification);
    }

    public function edit($id){
        $data = Department::find($id);
        $users = User::latest()->get();
        return view('layouts.pages.department.edit', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        $data = Department::find($id);
        $data->dept_name = $request->dept_name;
        $data->dept_head = $request->dept_head;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        $notification = array('messege' => 'Department data update successfully.', 'alert-type' => 'success');
        return redirect()->route('dep_det.index')->with($notification);
    }

    public function show($id){
        $data = Department::with('user')->find($id);
        // $data = Department::find($id);
        return view('layouts.pages.department.show', compact('data'));
    }
}
