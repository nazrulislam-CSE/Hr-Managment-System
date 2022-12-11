<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Session;
use Hash;
use Image;
use App\Models\Salary;
use App\Models\SalaryPaid;
use DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::latest()->get();
        return view('backend.employe.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('backend.employe.create', compact('roles','departments'));
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
            'name'          => 'required',
            'gender'        => 'required',
            'date_birth'    => 'required',
            'joing_date'    => 'required',
            'joing_salary'  => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'phone'         => 'required',
            'employe_image' => 'required',
            'date_birth'    => 'required'
        ]);

        /* ==========  start client profile logo ============ */
        if($request->hasfile('employe_image')){
            $image = $request->file('employe_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('uploads/employe/'.$name_gen);
            $employe_image = 'uploads/employe/'.$name_gen; 
        }else{
            $employe_image = '';
        }
        /* ==========  end client profile logo ============ */

        if(User::where('email', $request->email)->first() == null){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = "3";
            $user->password = Hash::make($request->password);
            if($user->save()){
                $employe = new Employe;
                $employe->user_id           = $user->id;
                $employe->role_id           = $request->role_id;
                $employe->department_id     = $request->department_id;
                $employe->designation_id    = $request->designation_id;
                $employe->name              = $request->name;
                $employe->gender            = $request->gender;
                $employe->date_birth        = $request->date_birth;
                $employe->joing_date        = $request->joing_date;
                $employe->joing_salary      = $request->joing_salary;
                $employe->username          = $request->username;
                $employe->email             = $request->email;
                $employe->password          = Hash::make($request->password);
                $employe->phone             = $request->phone;
                $employe->address           = $request->address;
                $employe->expense           = $request->expense;
                $employe->employe_image     = $employe_image;
                if($employe->save()){
                    Session::flash('success','Employe has been inserted successfully');
                    return redirect()->route('employe.index');
                }
            }
        }else{
            Session::flash('error','Email already used');
            return redirect()->back();
        }

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
        $employes = Employe::find($id);
        $roles = Role::all();
        $departments = Department::all();
        return view('backend.employe.edit', compact('employes','roles','departments'));
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
            'name'          => 'required',
            'gender'        => 'required',
            'date_birth'    => 'required',
            'joing_date'    => 'required',
            'joing_salary'  => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'employe_image' => 'required',
            'date_birth'    => 'required'
        ]);

        $employe = Employe::findOrFail($id);
        // dd($employe);

        /* ==========  start employe profile logo ============ */
        if($request->hasfile('employe_image')){
            try {
                if(file_exists($employe->employe_image)){
                    unlink($employe->employe_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('employe_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('uploads/employe/'.$name_gen);
            $employe_image = 'uploads/employe/'.$name_gen; 
        }else{
            $employe_image = '';
        }
        /* ==========  end employe profile logo ============ */


        $user           = $employe->users;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;

        if(strlen($request->password) > 0){
            $user->password = Hash::make($request->password);
        }

        if($user->save()){
            $employe->user_id           = $user->id;
            $employe->role_id           = $request->role_id;
            $employe->department_id     = $request->department_id;
            $employe->designation_id    = $request->designation_id;
            $employe->name              = $request->name;
            $employe->gender            = $request->gender;
            $employe->date_birth        = $request->date_birth;
            $employe->joing_date        = $request->joing_date;
            $employe->joing_salary      = $request->joing_salary;
            $employe->username          = $request->username;
            $employe->email             = $request->email;
            $employe->password          = Hash::make($request->password);
            $employe->phone             = $request->phone;
            $employe->address           = $request->address;
            $employe->expense           = $request->expense;
            $employe->employe_image     = $employe_image;
            if($employe->save()){
                Session::flash('success','Employe has been updated successfully');
                return redirect()->route('employe.index');
            }
        }else{
            Session::flash('error','Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy(Employe::findOrFail($id)->users->id);
        if(Employe::destroy($id)){
            
            Session::flash('success','Employe has been deleted successfully');
            return redirect()->route('employe.index');
        }

        Session::flash('error','Something went wrong');
        return redirect()->back();
    }

    public function active($id){
        $employe = Employe::find($id);
        $employe->status = 1;
        $employe->save();

        Session::flash('success','Employe Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $employe = Employe::find($id);
        $employe->status = 0;
        $employe->save();

        Session::flash('success','Employe Disabled Successfully.');
        return redirect()->back();
    }

    //  Employes Sallery All Method //
    public function employ_sallary()
    {
        $employes = Employe::latest()->get();
        return view('backend.employe.sallery.index', compact('employes'));
    }

    public function employe_sallary_index($id){
        $info = Employe::find($id);
        return view('backend.employe.sallery.create',compact('info'));
    }

    public function employe_sallary_store(Request $request){

        // dd($request->all());
        $info = new Salary();
        $info->employe_id = $request->employe_id;
        $info->absent_days = $request->absent_days;
        $info->pay_amount = $request->pay_amount;
        $info->bonus_commission = $request->bonus_commission;
        $info->month = $request->month;
        $info->year = $request->year;
        $info->save();

        Session::flash('success','Employe Sallery Added Successfully.');
        return redirect()->back();
        // return view('backend.employe.sallery.pay_sallary',compact('info'));
    }


}
