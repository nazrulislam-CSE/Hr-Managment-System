<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Session;
use Hash;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return view('backend.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'         => 'required',
            'designations' => 'required'
        ]);

        Department::create([
            'name'          => $request->name,
            'designations'  => $request->designations,
            'description'   => $request->description,
            'status'        => $request->status
            
        ]);

        $notification = array(
            'message' => 'Department Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('department.index')->with($notification);

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
        $departments = Department::find($id);
        return view('backend.department.edit', compact('departments'));
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
        $this->validate($request,[
            'name'         => 'required',
            'designations' => 'required'
        ]);

        $department = Department::findOrFail($id);

        $department->name          = $request->name;
        $department->designations  = $request->designations;
        $department->description   = $request->description;
        $department->status        = $request->status;

        $department->save();

        Session::flash('success','Department Updated Successfully.');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        
        $department->delete();

        Session::flash('success','Department Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $department = Department::find($id);
        $department->status = 1;
        $department->save();

        Session::flash('success','Department Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $department = Department::find($id);
        $department->status = 0;
        $department->save();

        Session::flash('success','Department Disabled Successfully.');
        return redirect()->back();
    }
}
