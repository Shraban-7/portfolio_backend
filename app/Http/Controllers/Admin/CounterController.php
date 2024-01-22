<?php

namespace App\Http\Controllers\Admin;

use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CounterController extends Controller
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
        $counters = counter::where('user_id',$this->user_id)->get();

        return view('admin.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.counter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'count'=>'required|integer',
            // 'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'image' => 'required',
        ]);

        // $image = $request->file('image');
        // if ($image) {
        //     $manager = new ImageManager(new Driver());
        //     $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
        //     $uploadpath = 'uploads/image/counter/';
        //     if (!file_exists($uploadpath)) {
        //         mkdir($uploadpath, 0755, true);
        //     }
        //     $image4Url = $uploadpath . $name;
        //     $img = $manager->read($image->getRealPath());
        //     $img = $img->resize(370, 246);
        //     $img->toWebp(75)->save($image4Url);

        // }

        Counter::create([
            'user_id'=>$this->user_id,
            'title' => $request->title,
            'image' => $request->image,
            'count' => $request->count,
        ]);

        return redirect()->back()->with('success', 'counter save successfully');
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
        $counter = Counter::findOrFail($id);
        return view('admin.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $counter = Counter::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'count'=>'required|integer',
            // 'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
            'image' => 'nullable',
        ]);

        // $old_img = $counter->image;

        // $image = $request->file('image');
        // if ($image) {

        //     if ($old_img) {
        //         $oldImagePath = public_path($old_img);
        //         if (file_exists($oldImagePath)) {
        //             File::delete($counter->image);
        //         }
        //     }
        //     $manager = new ImageManager(new Driver());
        //     $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
        //     $uploadpath = 'uploads/image/counter/';

        //     $imageUrl = $uploadpath . $name;
        //     $img = $manager->read($image->getRealPath());
        //     $img = $img->resize(370, 246);
        //     $img->toWebp(75)->save($imageUrl);
        //     $counter->image = $imageUrl;
        // }

        $counter->update([
            'user_id'=>$this->user_id,
            'title' => $request->title,
            'image'=>$request->image,
            'count' => $request->count,
        ]);

        return redirect()->route('counter.manage')->with('success', 'counter update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $counter = Counter::findOrFail($id);
        $counter->delete();
        return redirect()->route('counter.manage')->with('warning','Data delete permanently');
    }
}
