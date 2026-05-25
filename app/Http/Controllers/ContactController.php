<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class ContactController extends Controller
{
    use ImageUploadTrait;
    // عرض كل جهات الاتصال
    public function index()
    {
        $contacts = Contacts::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        if (Contacts::count() >= 1) {
            return redirect()->route('admin.contacts.index')
                             ->with('error', 'لا يمكن إضافة أكثر من جهة اتصال واحدة. يمكنك تعديل السجل الحالي.');
        }

        return view('admin.contacts.create');
    }

    // حفظ جهة اتصال جديدة
    public function store(Request $request)
    {
        if (Contacts::count() >= 1) {
            return redirect()->route('admin.contacts.index')
                             ->with('error', 'لا يمكن إضافة أكثر من جهة اتصال واحدة. يمكنك تعديل السجل الحالي.');
        }

        $data = $request->validate([
            'phone_number'      => 'required|string|max:20',
            'facebook_url'      => 'nullable|url|max:255',
            'tiktok_url'        => 'nullable|url|max:255',
            'whatsapp_url'      => 'nullable|url|max:255',
            'instagram_url'     => 'nullable|url|max:255',
            'linkedin_url'      => 'nullable|url|max:255',
            'telegram_url'      => 'nullable|url|max:255',
            'x_url'             => 'nullable|url|max:255',
            'email'             => 'nullable|email|max:255',
            'location_ar'       => 'nullable|string|max:255',
            'location_en'       => 'nullable|string|max:255',
            'footer_desc_ar'    => 'nullable|string',
            'footer_desc_en'    => 'nullable|string',
            'developer_name_ar' => 'nullable|string|max:255',
            'developer_name_en' => 'nullable|string|max:255',
            'developer_link'    => 'nullable|url|max:255',
            'developer_logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'birth_place'       => 'nullable|string',
        ]);

        // التحقق من سؤال الأمان عند محاولة رفع الشعار
        if ($request->hasFile('developer_logo') || $request->filled('cropped_image')) {
            if ($request->birth_place !== 'المالحة') {
                return redirect()->back()->withInput()->withErrors(['birth_place' => app()->getLocale() == 'ar' ? 'إجابة سؤال الأمان غير صحيحة!' : 'Incorrect security question answer!']);
            }
        }

        $data['developer_logo'] = $this->uploadImage($request, 'developer_logo', 'cropped_image', 'contacts', null);

        Contacts::create($data);

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'تم إضافة جهة الاتصال بنجاح!');
    }

    // عرض صفحة تعديل جهة اتصال موجودة
    public function edit($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    // تحديث جهة الاتصال
    public function update(Request $request, $id)
    {
        $contact = Contacts::findOrFail($id);

        $data = $request->validate([
            'phone_number'      => 'required|string|max:20',
            'facebook_url'      => 'nullable|url|max:255',
            'tiktok_url'        => 'nullable|url|max:255',
            'whatsapp_url'      => 'nullable|url|max:255',
            'instagram_url'     => 'nullable|url|max:255',
            'linkedin_url'      => 'nullable|url|max:255',
            'telegram_url'      => 'nullable|url|max:255',
            'x_url'             => 'nullable|url|max:255',
            'email'             => 'nullable|email|max:255',
            'location_ar'       => 'nullable|string|max:255',
            'location_en'       => 'nullable|string|max:255',
            'footer_desc_ar'    => 'nullable|string',
            'footer_desc_en'    => 'nullable|string',
            'developer_name_ar' => 'nullable|string|max:255',
            'developer_name_en' => 'nullable|string|max:255',
            'developer_link'    => 'nullable|url|max:255',
            'developer_logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'birth_place'       => 'nullable|string',
        ]);

        // التحقق من سؤال الأمان عند محاولة تغيير الشعار
        if ($request->hasFile('developer_logo') || $request->filled('cropped_image')) {
            if ($request->birth_place !== 'المالحة') {
                return redirect()->back()->withInput()->withErrors(['birth_place' => app()->getLocale() == 'ar' ? 'إجابة سؤال الأمان غير صحيحة!' : 'Incorrect security question answer!']);
            }
        }

        $data['developer_logo'] = $this->uploadImage($request, 'developer_logo', 'cropped_image', 'contacts', $contact->developer_logo);

        $contact->update($data);

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'تم تحديث جهة الاتصال بنجاح!');
    }

    // حذف جهة الاتصال
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();


        return redirect()->route('admin.contacts.index')
                         ->with('success', 'تم حذف جهة الاتصال بنجاح!');
    }
}
