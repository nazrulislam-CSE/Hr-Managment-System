<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use Session;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::latest()->get();
        return view('backend.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.leave.create');
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
            'leaves'        => 'required',
            'description'   => 'required'
        ]);

        Leave::create([
            'name'          => $request->name,
            'leaves'        => $request->leaves,
            'description'   => $request->description,
            'status'        => $request->status
            
        ]);

        $notification = array(
            'message' => 'Leave Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('leave.index')->with($notification);
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
        $leaves = Leave::find($id);
        return view('backend.leave.edit', compact('leaves'));
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
            'leaves'        => 'required',
            'description'   => 'required'
        ]);

        $leave = Leave::findOrFail($id);

        $leave->name          = $request->name;
        $leave->leaves        = $request->leaves;
        $leave->description   = $request->description;
        $leave->status        = $request->status;

        $leave->save();

        Session::flash('success','Leave Updated Successfully.');
        return redirect()->route('leave.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        
        $leave->delete();

        Session::flash('success','Leave Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $leave = Leave::find($id);
        $leave->status = 1;
        $leave->save();

        Session::flash('success','Leave Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $leave = Leave::find($id);
        $leave->status = 0;
        $leave->save();

        Session::flash('success','Leave Disabled Successfully.');
        return redirect()->back();
    }
}
