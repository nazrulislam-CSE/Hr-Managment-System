<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Session;
use Hash;
use Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.client.create');
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
            'phone'        => 'required',
            'client_image' => 'required',   
            'gender'       => 'required'   
        ]);

        /* ==========  start client profile logo ============ */
        if($request->hasfile('client_image')){
            $image = $request->file('client_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('uploads/clients/'.$name_gen);
            $client_image = 'uploads/clients/'.$name_gen; 
        }else{
            $client_image = '';
        }
        /* ==========  end client profile logo ============ */

        Client::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'date'          => $request->date,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'client_image'  => $client_image,
            'status'        => $request->status
            
        ]);

        $notification = array(
            'message' => 'Client Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('client.index')->with($notification);
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
        $clients = Client::find($id);
        return view('backend.client.edit', compact('clients'));

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
            'phone'        => 'required',
            'client_image' => 'required',   
            'gender'       => 'required'   
        ]);

        $client = Client::findOrFail($id);

        // dd($client);

        /* ==========  start client profile logo ============ */
        if($request->hasfile('client_image')){
            try {
                if(file_exists($client->client_image)){
                    unlink($client->client_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('client_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('uploads/clients/'.$name_gen);
            $client_image = 'uploads/clients/'.$name_gen; 
        }else{
            $client_image = '';
        }
        /* ==========  end client profile logo ============ */

          
            $client->name          = $request->name;
            $client->username      = $request->username;
            $client->phone         = $request->phone;
            $client->address       = $request->address;
            $client->gender        = $request->gender;
            $client->date          = $request->date;
            $client->email         = $request->email;
            $client->password      = Hash::make($request->password);
            $client->client_image  = $client_image;
            $client->status        = $request->status;

            $client->save();

            Session::flash('success','Client Updated Successfully.');
            return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        try {
            if(file_exists($client->client_image)){
                unlink($client->client_image);
            }
        }catch (Exception $e) {
            
        }
        
        $client->delete();

        Session::flash('success','Client Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $client = Client::find($id);
        $client->status = 1;
        $client->save();

        Session::flash('success','Client Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $client = Client::find($id);
        $client->status = 0;
        $client->save();

        Session::flash('success','Client Disabled Successfully.');
        return redirect()->back();
    }
}
