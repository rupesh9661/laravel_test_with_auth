<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::paginate(10);
        return view('Employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('Employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result= Employee::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "company_id"=>$request->company_id
        ]);
        if($result){
            return redirect('employee')->with('success', 'data added successfully');
        }else{
            return redirect('employee/create')->with('failure', 'something went wrong unable to add data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decrypted_id=Crypt::decrypt($id);
        $data['employee']=Employee::find($decrypted_id);
        $data['companies']=Company::all();

        return view('Employee.edit', compact("data"));
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
        $update_arr=[
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "company_id"=>$request->company_id
        ];
        $result= Employee::where('id', $id)->update($update_arr);
        if($result){
            return redirect('employee')->with('success', 'data updated successfully');
        }else{
            return redirect('employee')->with('failure', 'something went wrong unable to update data');
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
        $decrypted_id=Crypt::decrypt($id);
        $result= Employee::destroy($decrypted_id);
        if($result){
            return redirect('employee')->with('success', 'data deleted successfully');
        }else{
            return redirect('employee')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
