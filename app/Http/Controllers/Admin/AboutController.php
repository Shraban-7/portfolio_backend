<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AboutController extends Controller
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
        // $abouts = about::with('technologies');

        return view('admin.about.index');

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
            $uploadpath = 'uploads/image/about/';
            if (!file_exists($uploadpath)) {
                mkdir($uploadpath, 0755, true);
            }
            $image4Url = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url);

        }

        About::create([

            'title' => $request->title,
            'description' => $request->description,
            'image' => $image4Url,
        ]);

        return redirect()->back()->with('success', 'about save successfully');
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
    public function edit()
    {
        $about = About::where('user_id', Auth::user()->id)->first();

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $about = About::where('user_id', Auth::user()->id)->first();

        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        if ($about) {

            $old_img = $about->image;
        } else {
            $old_img = '';
        }

        // $old_img = $about->image;

        $imageUrl = '';

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($about->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/about/';
            $uploadpath1 = 'cv/uploads/image/about/';
            $imageUrl = $uploadpath . $name;
            $imageUrl1 = $uploadpath1 . $name;
            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(90)->save($imageUrl1);
        }

        if ($about) {

            if ($imageUrl == null) {
                $imageUrl = $about->image;
            }
            $about->update([
                'user_id' => $this->user_id,
                'title' => $request->title,
                'image' => $imageUrl,
                'description' => $request->description,
            ]);
        } else {
            About::create([
                'user_id' => $this->user_id,
                'title' => $request->title,
                'image' => $imageUrl,
                'description' => $request->description,
            ]);
        }

        return redirect()->back()->with('success', 'about update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = about::findOrFail($id);
        File::delete($about->image);
        $about->delete();
        return redirect()->route('about.manage')->with('warning', 'about delete permanently');
    }
}
