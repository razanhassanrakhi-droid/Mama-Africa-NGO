<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hero;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class HeroController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::first();
        if (!$hero) {
            $hero = new Hero();
        }

        $data = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',
            'org_name_ar' => 'nullable|string|max:255',
            'org_name_en' => 'nullable|string|max:255',
            'tagline_ar' => 'nullable|string|max:255',
            'tagline_en' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $hero->title_ar = $data['title_ar'];
        $hero->title_en = $data['title_en'];
        $hero->description_ar = $data['description_ar'];
        $hero->description_en = $data['description_en'];
        $hero->org_name_ar = $data['org_name_ar'] ?? null;
        $hero->org_name_en = $data['org_name_en'] ?? null;
        $hero->tagline_ar = $data['tagline_ar'] ?? null;
        $hero->tagline_en = $data['tagline_en'] ?? null;

        $hero->image = $this->uploadImage($request, 'image', 'cropped_image', 'hero_images', $hero->image);
        if ($request->input('reset_image') && !$request->filled('cropped_image')) {
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
            $hero->image = null;
        }

        $hero->logo = $this->uploadImage($request, 'logo', 'cropped_logo', 'hero_images', $hero->logo);
        if ($request->input('reset_logo') && !$request->filled('cropped_logo')) {
            if ($hero->logo && Storage::disk('public')->exists($hero->logo)) {
                Storage::disk('public')->delete($hero->logo);
            }
            $hero->logo = null;
        }

        $hero->save();

        return redirect()->back()->with('success', 'Hero section updated successfully!');
    }
}
