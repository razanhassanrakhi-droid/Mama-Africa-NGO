<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class TestimonialsController extends Controller
{
    use ImageUploadTrait;
    // عرض كل الآراء
    public function index()
    {
        $testimonials = Testimonials::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

// حفظ رأي جديد
public function store(Request $request)
{
    $data = $request->validate([
        'name.ar'    => 'required|string|max:255',
        'name.en'    => 'required|string|max:255',
        'comment.ar' => 'required|string',
        'comment.en' => 'required|string',
        'image'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'cropped_image' => 'nullable|string',
        'video_link' => 'nullable|url',
    ]);

    $testimonial = new Testimonials();

    $testimonial->setTranslation('name', 'ar', $data['name']['ar']);
    $testimonial->setTranslation('name', 'en', $data['name']['en']);
    $testimonial->setTranslation('comment', 'ar', $data['comment']['ar']);
    $testimonial->setTranslation('comment', 'en', $data['comment']['en']);
    $testimonial->video_link = $data['video_link'] ?? null;

    $testimonial->image = $this->uploadImage($request, 'image', 'cropped_image', 'testimonials');

    $testimonial->save();

    return redirect()->route('admin.testimonials.index')->with('success', 'تم إضافة الرأي بنجاح');
}    // عرض صفحة التعديل
    public function edit($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    // تحديث الرأي
public function update(Request $request, $id)
{
    $testimonial = Testimonials::findOrFail($id);

    $data = $request->validate([
        'name.ar'    => 'required|string|max:255',
        'name.en'    => 'required|string|max:255',
        'comment.ar' => 'required|string',
        'comment.en' => 'required|string',
        'image'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'cropped_image' => 'nullable|string',
        'video_link' => 'nullable|url',
    ]);

    $testimonial->setTranslation('name', 'ar', $data['name']['ar']);
    $testimonial->setTranslation('name', 'en', $data['name']['en']);
    $testimonial->setTranslation('comment', 'ar', $data['comment']['ar']);
    $testimonial->setTranslation('comment', 'en', $data['comment']['en']);
    $testimonial->video_link = $data['video_link'] ?? null;

    $testimonial->image = $this->uploadImage($request, 'image', 'cropped_image', 'testimonials', $testimonial->image);

    $testimonial->save();

    return redirect()->route('admin.testimonials.index')->with('success', 'تم التعديل بنجاح');
}
    // حذف الرأي
    public function destroy($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'تم الحذف بنجاح');
    }
}
