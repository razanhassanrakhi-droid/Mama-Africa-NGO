<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;

class AboutController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        $data = $request->validate([
            'vision_title_ar' => 'required|string|max:255',
            'vision_title_en' => 'required|string|max:255',
            'vision_desc_ar' => 'required|string',
            'vision_desc_en' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',

            'value_title_ar' => 'required|string|max:255',
            'value_title_en' => 'required|string|max:255',
            'value_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',
            
            'value_participation_ar' => 'required|string|max:255',
            'value_participation_en' => 'required|string|max:255',
            'value_participation_desc_ar' => 'required|string',
            'value_participation_desc_en' => 'required|string',

            'value_integrity_ar' => 'required|string|max:255',
            'value_integrity_en' => 'required|string|max:255',
            'value_integrity_desc_ar' => 'required|string',
            'value_integrity_desc_en' => 'required|string',

            'value_transparency_ar' => 'required|string|max:255',
            'value_transparency_en' => 'required|string|max:255',
            'value_transparency_desc_ar' => 'required|string',
            'value_transparency_desc_en' => 'required|string',

            'value_accountability_ar' => 'required|string|max:255',
            'value_accountability_en' => 'required|string|max:255',
            'value_accountability_desc_ar' => 'required|string',
            'value_accountability_desc_en' => 'required|string',

            'mission_title_ar' => 'required|string|max:255',
            'mission_title_en' => 'required|string|max:255',
            'mission_desc_ar' => 'required|string',
            'mission_desc_en' => 'required|string',
            'mission_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',

            'history_title_ar' => 'required|string|max:255',
            'history_title_en' => 'required|string|max:255',
            'history_desc_ar' => 'required|string',
            'history_desc_en' => 'required|string',
            'history_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',

            'goal_title_ar' => 'required|string|max:255',
            'goal_title_en' => 'required|string|max:255',
            'goal_desc_ar' => 'required|string',
            'goal_desc_en' => 'required|string',
            'goal_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5048',
        ]);

        $about->fill($request->except(['vision_image', 'mission_image', 'value_image', 'history_image', 'goal_image']));

        $about->vision_image = $this->uploadImage($request, 'vision_image', 'cropped_vision_image', 'about_images', $about->vision_image);
        if ($request->input('reset_vision_image') && !$request->filled('cropped_vision_image')) {
            if ($about->vision_image && Storage::disk('public')->exists($about->vision_image)) {
                Storage::disk('public')->delete($about->vision_image);
            }
            $about->vision_image = null;
        }

        $about->mission_image = $this->uploadImage($request, 'mission_image', 'cropped_mission_image', 'about_images', $about->mission_image);
        if ($request->input('reset_mission_image') && !$request->filled('cropped_mission_image')) {
            if ($about->mission_image && Storage::disk('public')->exists($about->mission_image)) {
                Storage::disk('public')->delete($about->mission_image);
            }
            $about->mission_image = null;
        }

        $about->value_image = $this->uploadImage($request, 'value_image', 'cropped_value_image', 'about_images', $about->value_image);
        if ($request->input('reset_value_image') && !$request->filled('cropped_value_image')) {
            if ($about->value_image && Storage::disk('public')->exists($about->value_image)) {
                Storage::disk('public')->delete($about->value_image);
            }
            $about->value_image = null;
        }

        $about->history_image = $this->uploadImage($request, 'history_image', 'cropped_history_image', 'about_images', $about->history_image);
        if ($request->input('reset_history_image') && !$request->filled('cropped_history_image')) {
            if ($about->history_image && Storage::disk('public')->exists($about->history_image)) {
                Storage::disk('public')->delete($about->history_image);
            }
            $about->history_image = null;
        }

        $about->goal_image = $this->uploadImage($request, 'goal_image', 'cropped_goal_image', 'about_images', $about->goal_image);
        if ($request->input('reset_goal_image') && !$request->filled('cropped_goal_image')) {
            if ($about->goal_image && Storage::disk('public')->exists($about->goal_image)) {
                Storage::disk('public')->delete($about->goal_image);
            }
            $about->goal_image = null;
        }

        $about->save();

        return redirect()->back()->with('success', 'About section updated successfully!');
    }
}
