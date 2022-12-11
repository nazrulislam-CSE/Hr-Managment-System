<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banking;
use Session;

class BankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankings = Banking::latest()->get();
        return view('backend.banking.index', compact('bankings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banking.create');
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
            'holder_name'       => 'required',
            'bank_name'         => 'required',
            'account_no'        => 'required',
            'opening_balance'   => 'required',
            'phone'             => 'required',
            'address'           => 'required'
        ]);

        Banking::create([
            'holder_name'       => $request->holder_name,
            'bank_name'         => $request->bank_name,
            'account_no'        => $request->account_no,
            'opening_balance'   => $request->opening_balance,
            'phone'             => $request->phone,
            'address'           => $request->address,
            'status'            => $request->status
            
        ]);

        $notification = array(
            'message' => 'Banking Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('banking.index')->with($notification);

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
        $bankings = Banking::find($id);
        return view('backend.banking.edit', compact('bankings'));
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
            'holder_name'       => 'required',
            'bank_name'         => 'required',
            'account_no'        => 'required',
            'opening_balance'   => 'required',
            'phone'             => 'required',
            'address'           => 'required'
        ]);

        $banking = Banking::findOrFail($id);

        $banking->holder_name       = $request->holder_name;
        $banking->bank_name         = $request->bank_name;
        $banking->account_no        = $request->account_no;
        $banking->opening_balance   = $request->opening_balance;
        $banking->phone             = $request->phone;
        $banking->address           = $request->address;
        $banking->status            = $request->status;

        $banking->save();

        Session::flash('success','Banking Updated Successfully.');
        return redirect()->route('banking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banking = Banking::findOrFail($id);
        
        $banking->delete();

        $notification = array(
            'message' => 'Banking Parmanently Deleted Successfully.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $banking = Banking::find($id);
        $banking->status = 1;
        $banking->save();

        Session::flash('success','Banking Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $banking = Banking::find($id);
        $banking->status = 0;
        $banking->save();

        Session::flash('success','Banking Disabled Successfully.');
        return redirect()->back();
    }
}
