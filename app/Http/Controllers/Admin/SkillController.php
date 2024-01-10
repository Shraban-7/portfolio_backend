<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills= Skill::all();
        return view('admin.skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:50',
            'present'=>'min:1|max:100'
        ]);

        Skill::create($request->all());
        return redirect()->route('skill.manage')->with('success','skill save successfully');
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
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $request->validate([
            'title'=>'nullable|max:50',
            'present'=>'nullable|min:1|max:100'
        ]);

        $skill->update($request->all());
        return redirect()->route('skill.manage')->with('success','skill update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();
        return redirect()->back();
    }
}
