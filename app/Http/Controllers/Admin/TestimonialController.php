<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id','DESC')->get();
        return view('admin.testimonial.index',compact('testimonials'));
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
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $image = $request->file('image');
        if ($image) {
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/testimonial/';
            if (!file_exists($uploadpath)) {
                mkdir($uploadpath, 0755, true);
            }
            $image4Url = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url);

        }

        Testimonial::create([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'description'=>$request->description,
            'image'=>$image4Url
        ]);

        return redirect()->route('testimonial.manage')->with('success','testimonial save successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial= Testimonial::findOrFail($id);

        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial= Testimonial::findOrFail($id);
        $request->validate([
            'name' => 'nullable',
            'designation' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $old_img = $testimonial->image;

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($testimonial->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/testimonial/';

            $imageUrl = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($imageUrl);
            $testimonial->image = $imageUrl;
        }

        $testimonial->update([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'description'=>$request->description,
        ]);

        return redirect()->route('testimonial.manage')->with('success','testimonial update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial= Testimonial::findOrFail($id);

        File::delete($testimonial->image);
        $testimonial->delete();
        return redirect()->route('testimonial.manage');
    }
}
