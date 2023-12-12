<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::paginate(10);
        return view('Company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $img_name = $image->getClientOriginalName();
            $img_final_name = "logo" . date("YmdHis") . $img_name;
            $path='images/logo/';
            $image->move($path, $img_final_name);
        }
        $result= Company::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "logo_image_name"=>$img_final_name
        ]);
        if($result){
            return redirect('company')->with('success', 'data added successfully');
        }else{
            return redirect('company/create')->with('failure', 'something went wrong unable to add data');
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
        $data['company']=Company::find($decrypted_id);
        return view('Company.edit', compact("data"));
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
            "email"=>$request->email
        ];
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $img_name = $image->getClientOriginalName();
            $img_final_name = "logo" . date("YmdHis") . $img_name;
            $path='images/logo/';
            $image->move($path, $img_final_name);
            $update_arr["logo_image_name"]=$img_final_name;
        }
        $result= Company::where('id', $id)->update($update_arr);
        if($result){
            return redirect('company')->with('success', 'data updated successfully');
        }else{
            return redirect('company')->with('failure', 'something went wrong unable to update data');
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
        $result= Company::destroy($decrypted_id);
        if($result){
            return redirect('company')->with('success', 'data deleted successfully');
        }else{
            return redirect('company')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
