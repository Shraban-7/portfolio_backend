<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\HeroSubTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        $hero = hero::where('user_id', $this->user_id)->first();

        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {

        // return $request->all();
        $hero = hero::where('user_id', Auth::user()->id)->first();

        // return $hero->id;

        $request->validate([
            'title' => 'nullable',
            // 'sub_titles'=>'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        if ($hero) {
            $old_img = $hero->image;
        } else {
            $old_img = '';
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

            if ($imageUrl == null) {
                $imageUrl = $hero->image;
            }
            $hero->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'image' => $imageUrl,
            ]);

        } else {

            Hero::Create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'image' => $imageUrl,
            ]);

        }

        $this->syncSubtitles($hero, $request->input('sub_titles', []));

        return redirect()->back()->with('success', 'hero update successfully');
    }

    protected function syncSubtitles(Hero $hero, array $subTitles)
    {
        $subTitleIds = [];

        foreach ($subTitles as $subTitle) {
            $subTitleModel = HeroSubTitle::firstOrCreate(['sub_title' => $subTitle]);
            $subTitleIds[] = $subTitleModel->id;
        }

        $hero->subtitles()->sync($subTitleIds);
    }

    public function deleteSubtitle($id)
    {
        $subTitle= HeroSubTitle::findOrFail($id);
        $subTitle->delete();
        return redirect()->route('hero.edit')->with('waring','subtitle delete permanently');
    }

}
