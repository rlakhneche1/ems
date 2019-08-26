<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Employe;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index_employe', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.create_employe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "dateofbirth" => "required",
            "gender" => "required",
            "adresse" => "required",
            "phone" => "required",
            "email" => "required",
            "position" => "required",
            "startdate" => "required",
            "salary" => "required",
        ],[
            "firstname.required" => "The field is required",
            "lastname.required" => "The field is required",
            "dateofbirth.required" => "The field is required",
            "gender.required" => "The field is required",
            "adresse.required" => "The field is required",
            "phone.required" => "The field is required",
            "email.required" => "The field is required",
            "position.required" => "The field is required",
            "startdate.required" => "The field is required",
            "salary.required" => "The field is required",
        ]);

        $employe = Employe::FirstOrCreate([
            "first_name" => $request->firstname,
            "last_name" => $request->lastname,
            "birth_date" => $request->dateofbirth,
            "gender" => $request->gender,
            "adresse" => $request->adresse,
            "phone" => $request->phone,
            "email_address" => $request->email,
            "position" => $request->position,
            "office" => $request->office,
            "start_date" => $request->startdate,
            "salary" => $request->salary,
        ]);

        return redirect()->route('employe.show', $employe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::FindOrFail($id);
        return view('employes.show_employe', compact('employe'));
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
        $employe = Employe::FindOrFail($id);

        $employe->update([
            "first_name" => $request->firstname,
            "last_name" => $request->lastname,
            "birth_date" => $request->dateofbirth,
            "gender" => $request->gender,
            "adresse" => $request->adresse,
            "phone" => $request->phone,
            "email_address" => $request->email,
            "position" => $request->position,
            "office" => $request->office,
            "start_date" => $request->startdate,
            "salary" => $request->salary,
        ]);

        return redirect()->route('employe.show', $employe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::destroy($id);
        return redirect()->route('employe.index');
    }
}
