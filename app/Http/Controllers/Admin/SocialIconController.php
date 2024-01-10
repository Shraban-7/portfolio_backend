<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialIcon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SocialIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social_icons = SocialIcon::orderBy('id', 'DESC')->get();
        return view('admin.socialicon.index', compact('social_icons'));
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
            'title' => 'required',
            'link'=>'nullable|url',
            'icon' => 'required',
        ]);



        SocialIcon::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('success', 'portfolio save successfully');
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
        $social_icon = SocialIcon::findOrFail($id);
        return view('admin.socialicon.edit', compact('social_icon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $social_icon = SocialIcon::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'link' => 'nullable|url',
            'icon' => 'nullable',
        ]);



        $social_icon->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'link' => $request->link,
        ]);

        return redirect()->route('social_icon.manage')->with('success', 'portfolio update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social_icon = SocialIcon::findOrFail($id);
        $social_icon->delete();
        return redirect()->route('social_icon.manage');
    }
}
