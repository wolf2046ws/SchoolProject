<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Company;
use App\Resort;
use App\Hardware;
use App\Software;
use App\ComponentRequest;
use App\AccessFile;

//use Illuminate\Support\Facades\Validator;
use App\Http\Requests\userDataValidation;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        $companies = Company::all();
        $resorts = Resort::all();
        $users = User::all();
        $softwares = Software::all();
        $hardwares = Hardware::all();
        $files = AccessFile::all();

        return view('users.create', compact('departments', 'users',
                'companies', 'resorts', 'softwares', 'hardwares','files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userDataValidation $request)
    {
       //store to data base

       $user = User::create($request->all());
       $this->add_user_component($request,$user->id);
       session()->flash('success','User Added Successfully');
       return redirect(route('user.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
        //find or fail el users
        //return to view users.show and $user
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

    //    dd($user->software()->where('component_id','1')->count());
        $departments = Department::all();
        $companies = Company::all();
        $resorts = Resort::all();
        $users = User::all();
        $softwares = Software::all();
        $hardwares = Hardware::all();
        $files = AccessFile::all();

        return view('users.update', compact('departments', 'users',
                'companies', 'resorts','user', 'softwares', 'hardwares','files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userDataValidation $request, $id)
    {
        //validation
        //1-get user DataTable
        //2-Update
        //return true
        $user = User::findOrFail($id);
        $user->update($request->all());
        ComponentRequest::where('user_id',$user->id)->delete();
        $this->add_user_component($request,$user->id);
        session()->flash('success','User Updated Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //User::destroy($id)
        $user = User::findOrFail($id);
        $user->delete();
        ComponentRequest::where('user_id',$id)->delete();
        session()->flash('success','User Deleted Successfully');
        return redirect()->back();

    }


    public function add_user_component($request,$id){
        foreach ($request->softwares as $software => $value) {
            $component_request = new ComponentRequest();
            $component_request->user_id =  $id;
            $component_request->status = "pending" ;
            $component_request->component_type = "Software" ;
            $component_request->component_id = $value;
            $component_request->save();

        }

        foreach ($request->hardwares as $hardware => $value) {
            $component_request = new ComponentRequest();
            $component_request->user_id =  $id;
            $component_request->status = "pending" ;
            $component_request->component_type = "Hardware" ;
            $component_request->component_id = $value;
            $component_request->save();

        }

        foreach ($request->access_files as $file => $value) {
            $component_request = new ComponentRequest();
            $component_request->user_id =  $id;
            $component_request->status = "Not Allowed" ;
            $component_request->component_type = "Files" ;
            $component_request->component_id = $value;
            $component_request->save();

        }

        return true;
    }
}
