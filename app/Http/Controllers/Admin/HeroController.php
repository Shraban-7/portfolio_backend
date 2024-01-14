<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HeroController extends Controller
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


        return view('admin.hero.index');
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
            'sub_title1'=>'nullable',
            'sub_title2'=>'nullable',
            'sub_title3'=>'nullable',
            'sub_title4'=>'nullable',
            'sub_title5'=>'nullable',
            'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $image = $request->file('image');
        if ($image) {
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/hero/';
            $uploadpath1 = 'cv/uploads/image/hero/';

            $image4Url = $uploadpath . $name;
            $image4Url1 = $uploadpath1 . $name;
            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url1);

        }

        Hero::create([
            'title' => $request->title,
            'image' => $image4Url,
            'sub_title1' => $request->sub_title1,
            'sub_title2' => $request->sub_title2,
            'sub_title3' => $request->sub_title3,
            'sub_title4' => $request->sub_title4,
            'sub_title5' => $request->sub_title5,
        ]);

        return redirect()->back()->with('success', 'hero save successfully');
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

        $hero = hero::where('user_id',$this->user_id)->first();


        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {

        // return $request->all();
         $hero = hero::where('user_id',Auth::user()->id)->first();

        // return $hero->id;

        $request->validate([
            'title' => 'nullable',
            'link' => 'nullable|url',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        if($hero){
            $old_img = $hero->image;
        }else{
            $old_img='';
        }

        $imageUrl = '';
        $image = $request->file('image');
        if ($image) {
            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/hero/';
            $uploadpath1 = 'cv/uploads/image/hero/';

            $imageUrl = $uploadpath . $name;
            $imageUrl1 = $uploadpath1 . $name;

            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(100)->save($imageUrl1);
        }


        if ($hero) {

            if ($imageUrl==null) {
                $imageUrl=$hero->image;
            }
            $hero->update([
                'user_id'=>Auth::user()->id,
                'title' => $request->title,
                'image'=>$imageUrl,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'sub_title3' => $request->sub_title3,
                'sub_title4' => $request->sub_title4,
                'sub_title5' => $request->sub_title5,
            ]);
        } else {

            Hero::Create([
                'user_id'=>Auth::user()->id,
                'title' => $request->title,
                'image'=>$imageUrl,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'sub_title3' => $request->sub_title3,
                'sub_title4' => $request->sub_title4,
                'sub_title5' => $request->sub_title5,
            ]);
        }



        return redirect()->back()->with('success', 'hero update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hero = hero::findOrFail($id);
        File::delete($hero->image);
        $hero->delete();
        return redirect()->route('hero.manage')->with('warning', 'hero delete permanently');
    }
}
