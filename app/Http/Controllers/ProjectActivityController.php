<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProjectActivity;
use Illuminate\Http\Request;

class ProjectActivityController extends Controller
{
    // عرض قائمة الأنشطة والتدخلات التابعة لمشروع معين
    public function index($projectId)
    {
        $project = Projects::findOrFail($projectId);
        $activities = $project->activities()->latest()->get();
        return view('admin.activities.index', compact('project', 'activities'));
    }

    // عرض صفحة إضافة نشاط جديد
    public function create($projectId)
    {
        $project = Projects::findOrFail($projectId);
        return view('admin.activities.create', compact('project'));
    }

    // حفظ نشاط جديد
    public function store(Request $request, $projectId)
    {
        $project = Projects::findOrFail($projectId);

        $data = $request->validate([
            'title.ar' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description.ar' => 'required|string',
            'description.en' => 'required|string',
            'detail.ar' => 'nullable|string',
            'detail.en' => 'nullable|string',
            'location.ar' => 'required|string|max:255',
            'location.en' => 'required|string|max:255',
            'date.ar' => 'required|string|max:255',
            'date.en' => 'required|string|max:255',
            'funded_by.ar' => 'required|string|max:255',
            'funded_by.en' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
            'status' => 'required|string|in:completed,ongoing,in_progress,planned',
            'icon' => 'nullable|string|max:255',
        ]);

        $activity = new ProjectActivity();
        $activity->project_id = $project->id;

        $activity->setTranslation('title', 'ar', $data['title']['ar']);
        $activity->setTranslation('title', 'en', $data['title']['en']);

        $activity->setTranslation('description', 'ar', $data['description']['ar']);
        $activity->setTranslation('description', 'en', $data['description']['en']);

        $activity->setTranslation('detail', 'ar', $data['detail']['ar'] ?? '');
        $activity->setTranslation('detail', 'en', $data['detail']['en'] ?? '');

        $activity->setTranslation('location', 'ar', $data['location']['ar']);
        $activity->setTranslation('location', 'en', $data['location']['en']);

        $activity->setTranslation('date', 'ar', $data['date']['ar']);
        $activity->setTranslation('date', 'en', $data['date']['en']);

        $activity->setTranslation('funded_by', 'ar', $data['funded_by']['ar']);
        $activity->setTranslation('funded_by', 'en', $data['funded_by']['en']);

        $activity->amount = $data['amount'] ?? null;

        $statusMap = [
            'completed' => ['ar' => 'مكتمل', 'en' => 'Completed'],
            'ongoing' => ['ar' => 'مستمر', 'en' => 'Ongoing'],
            'in_progress' => ['ar' => 'قيد التنفيذ', 'en' => 'In Progress'],
            'planned' => ['ar' => 'قيد التخطيط', 'en' => 'Planned'],
        ];
        $statusVal = $request->input('status', 'completed');
        $statusTranslations = $statusMap[$statusVal] ?? $statusMap['completed'];

        $activity->setTranslation('status', 'ar', $statusTranslations['ar']);
        $activity->setTranslation('status', 'en', $statusTranslations['en']);

        $activity->icon = $data['icon'] ?? null;

        $activity->save();

        return redirect()->route('admin.projects.activities.index', $projectId)->with('success', 'تم إضافة النشاط بنجاح!');
    }

    // عرض صفحة تعديل نشاط
    public function edit($projectId, $id)
    {
        $project = Projects::findOrFail($projectId);
        $activity = ProjectActivity::findOrFail($id);
        return view('admin.activities.edit', compact('project', 'activity'));
    }

    // تحديث النشاط
    public function update(Request $request, $projectId, $id)
    {
        $project = Projects::findOrFail($projectId);
        $activity = ProjectActivity::findOrFail($id);

        $data = $request->validate([
            'title.ar' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'description.ar' => 'required|string',
            'description.en' => 'required|string',
            'detail.ar' => 'nullable|string',
            'detail.en' => 'nullable|string',
            'location.ar' => 'required|string|max:255',
            'location.en' => 'required|string|max:255',
            'date.ar' => 'required|string|max:255',
            'date.en' => 'required|string|max:255',
            'funded_by.ar' => 'required|string|max:255',
            'funded_by.en' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
            'status' => 'required|string|in:completed,ongoing,in_progress,planned',
            'icon' => 'nullable|string|max:255',
        ]);

        $activity->setTranslation('title', 'ar', $data['title']['ar']);
        $activity->setTranslation('title', 'en', $data['title']['en']);

        $activity->setTranslation('description', 'ar', $data['description']['ar']);
        $activity->setTranslation('description', 'en', $data['description']['en']);

        $activity->setTranslation('detail', 'ar', $data['detail']['ar'] ?? '');
        $activity->setTranslation('detail', 'en', $data['detail']['en'] ?? '');

        $activity->setTranslation('location', 'ar', $data['location']['ar']);
        $activity->setTranslation('location', 'en', $data['location']['en']);

        $activity->setTranslation('date', 'ar', $data['date']['ar']);
        $activity->setTranslation('date', 'en', $data['date']['en']);

        $activity->setTranslation('funded_by', 'ar', $data['funded_by']['ar']);
        $activity->setTranslation('funded_by', 'en', $data['funded_by']['en']);

        $activity->amount = $data['amount'] ?? null;

        $statusMap = [
            'completed' => ['ar' => 'مكتمل', 'en' => 'Completed'],
            'ongoing' => ['ar' => 'مستمر', 'en' => 'Ongoing'],
            'in_progress' => ['ar' => 'قيد التنفيذ', 'en' => 'In Progress'],
            'planned' => ['ar' => 'قيد التخطيط', 'en' => 'Planned'],
        ];
        $statusVal = $request->input('status', 'completed');
        $statusTranslations = $statusMap[$statusVal] ?? $statusMap['completed'];

        $activity->setTranslation('status', 'ar', $statusTranslations['ar']);
        $activity->setTranslation('status', 'en', $statusTranslations['en']);

        $activity->icon = $data['icon'] ?? null;

        $activity->save();

        return redirect()->route('admin.projects.activities.index', $projectId)->with('success', 'تم تعديل النشاط بنجاح!');
    }

    // حذف نشاط
    public function destroy($projectId, $id)
    {
        $activity = ProjectActivity::findOrFail($id);
        $activity->delete();

        return redirect()->route('admin.projects.activities.index', $projectId)->with('success', 'تم حذف النشاط بنجاح!');
    }
}
