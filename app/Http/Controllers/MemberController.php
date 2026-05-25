<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\TeamSetting;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class MemberController extends Controller
{
    use ImageUploadTrait;
    // عرض كل الأعضاء
    public function index()
    {
        $members = Members::all();
        $teamSetting = TeamSetting::first() ?? new TeamSetting();
        return view('admin.members.index', compact('members', 'teamSetting'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'desc_en' => 'nullable|string',
            'desc_ar' => 'nullable|string',
        ]);

        TeamSetting::updateOrCreate(
            ['id' => 1],
            $request->only(['title_en', 'title_ar', 'desc_en', 'desc_ar'])
        );

        return redirect()->back()->with('success', __('massage.updated_successfully') ?? 'Settings updated successfully');
    }

    public function create()
    {
        return view('admin.members.create');
    }

    

    // حفظ عضو جديد
    public function store(Request $request)
{
    $request->validate([
        'name.ar' => 'required|string|max:255',
        'name.en' => 'required|string|max:255',

        'position.ar' => 'required|string|max:255',
        'position.en' => 'required|string|max:255',

        'role.ar' => 'required|string|max:255',
        'role.en' => 'required|string|max:255',

        'message.ar' => 'nullable|string',
        'message.en' => 'nullable|string',

        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'cropped_image' => 'nullable|string',
    ]);

    $data = [
        'name' => $request->name,
        'position' => $request->position,
        'role' => $request->role,
        'message' => $request->message,
    ];

    $data['image'] = $this->uploadImage($request, 'image', 'cropped_image', 'members');

    Members::create($data);

    return redirect()->route('admin.members.index')
                     ->with('success', 'تم إضافة العضو بنجاح');
}

    // صفحة التعديل
    public function edit($id)
    {
        $member = Members::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }

    // تحديث بيانات عضو
   public function update(Request $request, Members $member)
{
    $request->validate([
        'name.ar' => 'required|string|max:255',
        'name.en' => 'required|string|max:255',

        'position.ar' => 'required|string|max:255',
        'position.en' => 'required|string|max:255',

        'role.ar' => 'required|string|max:255',
        'role.en' => 'required|string|max:255',

        'message.ar' => 'nullable|string',
        'message.en' => 'nullable|string',

        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'cropped_image' => 'nullable|string',
    ]);

    $data = [
        'name' => $request->name,
        'position' => $request->position,
        'role' => $request->role,
        'message' => $request->message,
    ];

    $data['image'] = $this->uploadImage($request, 'image', 'cropped_image', 'members', $member->image);

    $member->update($data);

    return redirect()->route('admin.members.index')
                     ->with('success', 'تم تحديث العضو بنجاح');
}

    // حذف عضو
    public function destroy($id)
    {
        Members::findOrFail($id)->delete();

        return redirect()->route('admin.members.index')
                         ->with('success', 'تم حذف العضو');
    }
}
