<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Company;
use App\Resort;
use Illuminate\Support\Facades\Validator;

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
        $users = User::latest()->paginate(10);
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

        return view('users.create', compact('departments', 'users',
                'companies', 'resorts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $v = Validator::make($request->all(), [

        'first_name' => 'required|max:100',
        'last_name' => 'required|max:100',
        'gender'=> 'required|in:male,female',
        'contract_start' => 'required',
        'contract_end' => 'required' ,

        'department_id' => 'required|exists:departments,id',
        'department_id.exists' => 'Not an existing ID',

        'company_id' => 'required|exists:companies,id',
        'company_id.exists' => 'Not an existing ID',

        'resort_id' => 'required|exists:resorts,id',
        'resort_id.exists' => 'Not an existing ID'

    ]);

    if ($v->fails())
       {
           //dd($v->errors());
           return redirect()->back()->withErrors($v->errors());
       }


       //store to data base
       $user = User::create($request->all());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
