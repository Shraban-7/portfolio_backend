<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    protected $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->user_id = Auth::user()->id;
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $services = Service::with('technologies');
        $services = Service::where('user_id', $this->user_id)->get();

        return view('admin.services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'image' => 'required',
        ]);

        // $image = $request->file('image');
        // if ($image) {
        //     $manager = new ImageManager(new Driver());
        //     $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
        //     $uploadpath = 'uploads/image/service/';
        //     $image4Url = $uploadpath . $name;
        //     $img = $manager->read($image->getRealPath());
        //     $img = $img->resize(370, 246);
        //     $img->toWebp(75)->save($image4Url);

        // }

        Service::create([
            'user_id' => $this->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'meta_tag' => $request->meta_tag,
            'meta_desc' => $request->meta_desc,
        ]);

        return redirect()->back()->with('success', 'service save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function is_active(string $id)
    {
        $service = Service::findOrFail($id);
        if ($service->status == 0) {
            $service->status = 1;
            $service->save();
        } else {
            $service->status = 0;
            $service->save();
        }

        return redirect()->route('service.manage')->with('success', 'service update successfully');
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
            // 'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'image' => 'nullable',
        ]);

        // $old_img = $service->image;

        // $image = $request->file('image');
        // if ($image) {

        //     if ($old_img) {
        //         $oldImagePath = public_path($old_img);
        //         if (file_exists($oldImagePath)) {
        //             File::delete($service->image);
        //         }
        //     }
        //     $manager = new ImageManager(new Driver());
        //     $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
        //     $uploadpath = 'uploads/image/service/';
        //     $imageUrl = $uploadpath . $name;
        //     $img = $manager->read($image->getRealPath());
        //     $img = $img->resize(370, 246);
        //     $img->toWebp(75)->save($imageUrl);
        //     $service->image = $imageUrl;
        // }

        $service->update([
            'user_id' => $this->user_id,
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_tag' => $request->meta_tag,
            'meta_desc' => $request->meta_desc,
        ]);

        return redirect()->route('service.manage')->with('success', 'service update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        File::delete($service->image);
        $service->delete();
        return redirect()->route('service.manage')->with('warning', 'service delete permanently');
    }
}
