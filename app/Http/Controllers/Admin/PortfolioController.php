<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('admin.portfolios.index', compact('portfolios'));
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
            'image' => 'required|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $image = $request->file('image');
        if ($image) {
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/portfolio/';
            if (!file_exists($uploadpath)) {
                mkdir($uploadpath, 0755, true);
            }
            $image4Url = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($image4Url);

        }

        Portfolio::create([
            'title' => $request->title,
            'image' => $image4Url,
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
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'title' => 'nullable',
            'link'=>'nullable|url',
            'image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp,avif,apng',
        ]);

        $old_img = $portfolio->image;

        $image = $request->file('image');
        if ($image) {

            if ($old_img) {
                $oldImagePath = public_path($old_img);
                if (file_exists($oldImagePath)) {
                    File::delete($portfolio->image);
                }
            }
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/image/portfolio/';

            $imageUrl = $uploadpath . $name;
            $img = $manager->read($image->getRealPath());
            $img = $img->resize(370, 246);
            $img->toWebp(75)->save($imageUrl);
            $portfolio->image = $imageUrl;
        }

        $portfolio->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('portfolio.manage')->with('success', 'portfolio update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        File::delete($portfolio->image);
        $portfolio->delete();
        return redirect()->route('portfolio.manage')->with('warning','portfolio delete permanently');
    }
}
