<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class ProjectsController extends Controller
{
    use ImageUploadTrait;
    // عرض كل المشاريع
    public function index()
    {
        $projects = Projects::all(); 
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    // عرض صفحة إنشاء مشروع جديد
    

    // حفظ مشروع جديد
public function store(Request $request)
{
    $data = $request->validate([
        'name.ar' => 'required|string|max:255',
        'name.en' => 'required|string|max:255',
        'challange.ar' => 'required|string',
        'challange.en' => 'required|string',
        'description.ar' => 'required|string',
        'description.en' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:4096',
        'icon' => 'nullable|string|max:255',
    ]);

    $project = new Projects();

    // حفظ الترجمات بشكل صحيح
    $project->setTranslation('name', 'ar', $data['name']['ar']);
    $project->setTranslation('name', 'en', $data['name']['en']);

    $project->setTranslation('challange', 'ar', $data['challange']['ar']);
    $project->setTranslation('challange', 'en', $data['challange']['en']);

    $project->setTranslation('description', 'ar', $data['description']['ar']);
    $project->setTranslation('description', 'en', $data['description']['en']);

    $project->icon = $request->icon;

    // رفع الصورة
    $project->image = $this->uploadImage($request, 'image', 'cropped_image', 'projects_images');

    $project->save();

    return redirect()->route('admin.projects.index')->with('success', 'تم إضافة المشروع بنجاح!');
}
    // عرض صفحة تعديل مشروع موجود
    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    // تحديث مشروع
public function update(Request $request, $id)
{
    $project = Projects::findOrFail($id);

    $data = $request->validate([
        'name.ar' => 'required|string|max:255',
        'name.en' => 'required|string|max:255',
        'challange.ar' => 'required|string',
        'challange.en' => 'required|string',
        'description.ar' => 'required|string',
        'description.en' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:4096',
        'icon' => 'nullable|string|max:255',
    ]);

    $project->setTranslation('name', 'ar', $data['name']['ar']);
    $project->setTranslation('name', 'en', $data['name']['en']);

    $project->setTranslation('challange', 'ar', $data['challange']['ar']);
    $project->setTranslation('challange', 'en', $data['challange']['en']); // ✅ تم تصحيح الاسم

    $project->setTranslation('description', 'ar', $data['description']['ar']);
    $project->setTranslation('description', 'en', $data['description']['en']);

    $project->icon = $request->icon;

    $project->image = $this->uploadImage($request, 'image', 'cropped_image', 'projects_images', $project->image);

    $project->save();

    return redirect()->route('admin.projects.index')->with('success', 'تم تعديل المشروع بنجاح!');
}
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح!');
    }
}
