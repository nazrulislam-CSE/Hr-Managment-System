<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banking;
use App\Models\Transfer;
use Session;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::latest()->get();
        return view('backend.transfer.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bankings = Banking::latest()->get();
        return view('backend.transfer.create', compact('bankings'));
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
            'form_account'  => 'required',
            'to_account'    => 'required',
            'amount'        => 'required',
            'date'          => 'required',
            'reference'     => 'required',
            'description'   => 'required'
        ]);


        Transfer::create([
            'form_account'  => $request->form_account,
            'to_account'    => $request->to_account,
            'amount'        => $request->amount,
            'date'          => $request->date,
            'reference'     => $request->reference,
            'description'   => $request->description,
            'status'        => $request->status
            
        ]);

        $notification = array(
            'message' => 'Transfer Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('transfer.index')->with($notification);

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
        $transfers = Transfer::find($id);
        $bankings = Banking::latest()->get();
        return view('backend.transfer.edit', compact('transfers','bankings'));
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
            'form_account'  => 'required',
            'to_account'    => 'required',
            'amount'        => 'required',
            'date'          => 'required',
            'reference'     => 'required',
            'description'   => 'required'
        ]);

        $transfer = Transfer::findOrFail($id);

        $transfer->form_account    = $request->form_account;
        $transfer->to_account      = $request->to_account;
        $transfer->amount          = $request->amount;
        $transfer->date            = $request->date;
        $transfer->reference       = $request->reference;
        $transfer->description     = $request->description;
        $transfer->status          = $request->status;

        $transfer->save();

        Session::flash('success','Transfer Updated Successfully.');
        return redirect()->route('transfer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = Transfer::findOrFail($id);
        
        $transfer->delete();

        $notification = array(
            'message' => 'Transfer Parmanently Deleted Successfully.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $transfer = Transfer::find($id);
        $transfer->status = 1;
        $transfer->save();

        Session::flash('success','Transfer Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $transfer = Transfer::find($id);
        $transfer->status = 0;
        $transfer->save();

        Session::flash('success','Transfer Disabled Successfully.');
        return redirect()->back();
    }
}
