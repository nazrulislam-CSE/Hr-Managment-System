<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Session;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('backend.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.notice.create');
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
            'title'         => 'required',
            'description'   => 'required',
            'date'          => 'required'
        ]);

        Notice::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'date'          => $request->date,
            'status'        => $request->status
            
        ]);

        $notification = array(
            'message' => 'Notice Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('notice.index')->with($notification);
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
        $notices = Notice::find($id);
        return view('backend.notice.edit', compact('notices'));
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
            'title'         => 'required',
            'description'   => 'required',
            'date'          => 'required'
        ]);

        $notice = Notice::findOrFail($id);

        $notice->title         = $request->title;
        $notice->description   = $request->description;
        $notice->date          = $request->date;
        $notice->status        = $request->status;

        $notice->save();

        Session::flash('success','Notice Updated Successfully.');
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        
        $notice->delete();

        Session::flash('success','Notice Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $notice = Notice::find($id);
        $notice->status = 1;
        $notice->save();

        Session::flash('success','Notice Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $notice = Notice::find($id);
        $notice->status = 0;
        $notice->save();

        Session::flash('success','Notice Disabled Successfully.');
        return redirect()->back();
    }
}
