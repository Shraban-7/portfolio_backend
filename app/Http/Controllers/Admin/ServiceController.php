<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $services = Service::with('technologies');
        $services = Service::all();

        return view('admin.services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // return "hi";

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $image = $request->file('image');
        if ($image) {
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/service/';
            $image4Url = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url);

        }

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image4Url,
        ]);

        return redirect()->back()->with('success','service save successfully');
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $old_img = $service->image;

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($service->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/service/';
            $imageUrl = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($imageUrl);
            $service->image = $imageUrl;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('service.manage')->with('success','service update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service= Service::findOrFail($id);
        File::delete($service->image);
        $service->delete();
        return redirect()->route('service.manage')->with('warning','service delete permanently');
    }
}
