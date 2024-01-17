<?php

namespace App\Http\Controllers\Admin;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PersonalInfoController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.personal_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=>'required|max:50',
            'email'=>'required|email',
            'phone'=>'required|min:10',
            'address'=>'required',
            'profile'=>'required|max:50',
        ]);

        PersonalInfo::create($request->all());
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
        $personal_info= PersonalInfo::where('user_id',$this->user_id)->first();
        return view('admin.personal_info.edit',compact('personal_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $personal_info= PersonalInfo::where('user_id',$this->user_id)->first();

        $request->validate([
            'full_name'=>'nullable|max:50',
            'email'=>'nullable|email',
            'phone'=>'nullable|min:10',
            'address'=>'nullable',
            'profile'=>'nullable|max:50',
        ]);


        if ($personal_info) {

            $old_img = $personal_info->image;
        } else {
            $old_img = '';
        }

        // $old_img = $personal_info->image;

        $imageUrl = '';

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($personal_info->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/personal_info/';
            $uploadpath1 = 'cv/uploads/image/personal_info/';
            $imageUrl = $uploadpath . $name;
            $imageUrl1 = $uploadpath1 . $name;
            $img = $manager->read($image->getRealPath());
            // $img = $img->resize(370, 246);
            $img->toWebp(90)->save($imageUrl1);
        }

        if ($personal_info) {

            if ($imageUrl == null) {
                $imageUrl = $personal_info->image;
            }
            $personal_info->update([
                'user_id'=>$this->user_id,
                'full_name'=>$request->full_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'profile'=>$request->profile,
                'image' => $imageUrl,
                'description' => $request->description,
            ]);
        } else {
            PersonalInfo::create([
                'user_id'=>$this->user_id,
                'full_name'=>$request->full_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'profile'=>$request->profile,
                'image' => $imageUrl,
                'description' => $request->description,
            ]);
        }




        return redirect()->back()->with('success','personal info save successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
