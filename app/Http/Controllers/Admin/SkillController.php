<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    protected $user_id;

    public function __construct()
    {
        // Check if the user is authenticated before accessing the ID
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::id(); // Use Auth::id() to get the authenticated user ID
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills= Skill::where('user_id',$this->user_id)->get();
        return view('admin.skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:50',
            'percent'=>'min:1|max:100'
        ]);

        Skill::create([
            'user_id'=>$this->user_id,
            'title'=>$request->title,
            'percent'=>$request->percent
        ]);
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
            'percent'=>'nullable|min:1|max:100'
        ]);

        $skill->update([
            'user_id'=>$this->user_id,
            'title'=>$request->title,
            'percent'=>$request->percent
        ]);
        return redirect()->route('skill.manage')->with('success','skill update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();
        return redirect()->route('skill.manage')->with('warning','Data delete permanently');
    }
}
