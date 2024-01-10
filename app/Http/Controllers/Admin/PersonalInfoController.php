<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.personal_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required|max:50',
            'email'=>'required|email',
            'phone'=>'required|min:14',
            'address'=>'required',
            'profile'=>'required|max:50',
        ]);

        PersonalInfo::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personal_info= PersonalInfo::findOrFail($id);
        return view('admin.personal_info.edit',compact('personal_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personal_info= PersonalInfo::findOrFail($id);

        $request->validate([
            'full_name'=>'nullable|max:50',
            'email'=>'nullable|email',
            'phone'=>'nullable|min:14',
            'address'=>'nullable',
            'profile'=>'nullable|max:50',
        ]);
        $personal_info->update($request->all());


        return redirect()->back()->with('success','personal info update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
