<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
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
        $blogs = Blog::with('category')->where('user_id',$this->user_id)->get();

        $categories= Category::where('user_id',$this->user_id)->get();

        return view('admin.blog.index', compact('blogs','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::where('user_id',$this->user_id)->get();
        return view('admin.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            // 'image' => 'required',
        ]);

        $image = $request->file('image');
        if ($image) {
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/blog/';
            $uploadpath1 = 'cv/uploads/image/blog/';
            $image4Url = $uploadpath . $name;
            $image4Url1 = $uploadpath1 . $name;
            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url1);

        }

        $slug= Str::slug($request->title);

        Blog::create([
            'user_id'=>$this->user_id,
            'category_id'=>$request->category_id,
            'title' => $request->title,
            'slug'=>$slug,
            'body' => $request->body,
            'image' => $image4Url,
            'meta_title'=>$request->meta_title,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,
        ]);

        return redirect()->back()->with('success','blog save successfully');
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
        $blog = Blog::findOrFail($id);
        $categories= Category::where('user_id',$this->user_id)->get();
        return view('admin.blog.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'body' => 'nullable',
            // 'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'image' => 'nullable',
        ]);


        $imageUrl='';

        $old_img = $blog->image;

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($blog->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/blog/';
            $uploadpath1 = 'cv/uploads/image/blog/';
            $imageUrl = $uploadpath . $name;
            $imageUrl1 = $uploadpath1 . $name;
            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(75)->save($imageUrl1);
            $blog->image = $imageUrl;
        }

        $slug= Str::slug($request->title);
        if ($imageUrl==null) {
            $imageUrl=$blog->image;
        }
        $blog->update([
            'user_id'=>$this->user_id,
            'category_id'=>$request->category_id,
            'title' => $request->title,
            'slug'=>$slug,
            'body' => $request->body,
            'image' => $imageUrl,
            'meta_title'=>$request->meta_title,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,
        ]);

        return redirect()->route('blog.manage')->with('success','blog update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog= Blog::findOrFail($id);
        File::delete('cv/'.$blog->image);
        $blog->delete();
        return redirect()->route('service.manage')->with('warning','blog delete permanently');
    }
}
