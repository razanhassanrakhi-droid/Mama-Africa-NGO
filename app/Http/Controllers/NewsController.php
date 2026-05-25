<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class NewsController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $news = News::with('project')->orderBy('published_at', 'desc')->orderBy('created_at', 'desc')->get(); 
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $projects = Projects::all();
        $totalProjects = Projects::count();
        return view('admin.news.create', compact('projects','totalProjects'));
    }


    // حفظ البيانات
    public function store(Request $request)
{
    $data = $request->validate([
        'title.ar' => 'required|string|max:255',
        'title.en' => 'required|string|max:255',
        'details.ar' => 'required|string',
        'details.en' => 'required|string',
        'challange.ar' => 'required|string',
    'challange.en' => 'required|string',  
        'project_id' => 'required|exists:projects,id',
        'pay' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'youtube_link' => 'nullable|url',
        'published_at' => 'nullable|date',
    ]);

    $dataToSave = [
        'title' => $data['title'],
        'details' => $data['details'],
         'challange' => $data['challange'],
        'project_id' => $data['project_id'],
        'pay' => $data['pay'],
        'youtube_link' => $data['youtube_link'] ?? null,
        'published_at' => $data['published_at'] ?? now()->toDateString(),
    ];

    // رفع الصورة لو موجودة
    $dataToSave['image'] = $this->uploadImage($request, 'image', 'cropped_image', 'news_images');

    News::create($dataToSave);

    return redirect()->route('admin.news.index')->with('success', 'تم حفظ الخبر باللغتين بنجاح!');
}

    public function destroy(News $news)
{
    // حذف الصورة لو موجودة
    if ($news->image) {
        \Storage::disk('public')->delete($news->image);
    }

    $news->delete();

    return redirect()->route('admin.news.index')->with('success', 'تم حذف الخبر بنجاح!');
}
// عرض الفورم مع البيانات الحالية
public function edit(News $news)
{
    $projects = \App\Models\Projects::all(); // لجلب المشاريع في القائمة
    return view('admin.news.edit', compact('news', 'projects'));
}

// حفظ التعديل
public function update(Request $request, News $news)
{
    // تحقق من صحة البيانات لكل لغة
    $data = $request->validate([
        'title.ar' => 'required|string|max:255',
        'title.en' => 'required|string|max:255',
        'details.ar' => 'required|string',
        'details.en' => 'required|string',
        'challange.ar' => 'required|string',
    'challange.en' => 'required|string',
        'project_id' => 'required|exists:projects,id',
        'pay' => 'required|numeric|min:0',
        'youtube_link' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        'published_at' => 'nullable|date',
    ]);

    $dataToUpdate = [
        'title' => $data['title'],
        'details' => $data['details'], 
          'challange' => $data['challange'],
        'project_id' => $data['project_id'],
        'pay' => $data['pay'],
        'youtube_link' => $data['youtube_link'] ?? null,
        'published_at' => $data['published_at'] ?? $news->published_at ?? now()->toDateString(),
    ];

    // رفع الصورة الجديدة إذا تم اختيار واحدة
    $dataToUpdate['image'] = $this->uploadImage($request, 'image', 'cropped_image', 'news_images', $news->image);

    $news->update($dataToUpdate);

    return redirect()->route('admin.news.index')->with('success', 'تم تعديل الخبر باللغتين بنجاح!');
}

}
