<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationSetting;
use App\Models\LocationAuditLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LocationSettingController extends Controller
{
    public function index()
    {
        $locations = LocationSetting::all();
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'                 => 'required|string|max:255',
            'name_en'                 => 'required|string|max:255',
            'latitude'                => 'required|numeric',
            'longitude'               => 'required|numeric',
            'activity_description_ar' => 'nullable|string|max:2000',
            'activity_description_en' => 'nullable|string|max:2000',
            'audit_pdf'               => 'nullable|file|mimes:pdf|max:10240', // 10MB max
            'start_date'              => 'nullable|date',
            'end_date'                => 'nullable|date',
        ]);

        $data = $request->except('audit_pdf');

        if ($request->hasFile('audit_pdf')) {
            $data['audit_pdf'] = $request->file('audit_pdf')->store('audit_logs', 'public');
        }

        LocationSetting::create($data);

        return redirect()->route('admin.location.index')->with('success', 'تم إضافة الموقع بنجاح!');
    }

    public function edit(LocationSetting $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, LocationSetting $location)
    {
        $request->validate([
            'name_ar'                 => 'required|string|max:255',
            'name_en'                 => 'required|string|max:255',
            'latitude'                => 'required|numeric',
            'longitude'               => 'required|numeric',
            'activity_description_ar' => 'nullable|string|max:2000',
            'activity_description_en' => 'nullable|string|max:2000',
            'audit_pdf'               => 'nullable|file|mimes:pdf|max:10240',
            'start_date'              => 'nullable|date',
            'end_date'                => 'nullable|date',
        ]);

        $data = $request->except('audit_pdf');

        if ($request->hasFile('audit_pdf')) {
            // Delete old file if exists
            if ($location->audit_pdf) {
                Storage::disk('public')->delete($location->audit_pdf);
            }
            $data['audit_pdf'] = $request->file('audit_pdf')->store('audit_logs', 'public');
        }

        $location->update($data);

        return redirect()->route('admin.location.index')->with('success', 'تم تحديث الموقع بنجاح!');
    }

    public function destroy(LocationSetting $location)
    {
        foreach ($location->auditLogs as $log) {
            Storage::disk('public')->delete($log->file_path);
        }
        $location->delete();
        return redirect()->route('admin.location.index')->with('success', 'تم حذف الموقع بنجاح!');
    }

    public function addLog(Request $request, LocationSetting $location)
    {
        $request->validate([
            'audit_pdf'  => 'required|file|mimes:pdf|max:102400', // 100MB max
            'start_date' => 'nullable|date',
            'end_date'   => 'nullable|date',
        ], [
            'audit_pdf.required' => 'يرجى اختيار ملف PDF.',
            'audit_pdf.file'     => 'الملف المرفوع غير صالح.',
            'audit_pdf.mimes'    => 'يجب أن يكون الملف من نوع PDF.',
            'audit_pdf.max'      => 'حجم الملف كبير جداً. الحد الأقصى 5 ميغابايت.',
        ]);

        try {
            // Diagnostic logging
            Log::info('Audit upload attempt', [
                'hasFile' => $request->hasFile('audit_pdf'),
                'allFiles' => $request->allFiles(),
                'requestData' => $request->except('audit_pdf'),
                'php_files' => $_FILES
            ]);

            if (!$request->hasFile('audit_pdf')) {
                return back()->with('error', 'لم يتم استلام أي ملف. تأكد من أن حجم الملف لا يتجاوز 100 ميجابايت.');
            }

            $file = $request->file('audit_pdf');
            if (!$file->isValid()) {
                $errorType = $file->getError();
                $errorMessage = $file->getErrorMessage();
                Log::error('Audit log upload invalid', [
                    'error_code' => $errorType,
                    'message' => $errorMessage
                ]);
                return back()->with('error', 'فشل رفع ملف التدقيق: ' . $errorMessage . ' (رمز الخطأ: ' . $errorType . ')');
            }

            $filePath = $file->store('audit_logs', 'public');

            if (!$filePath) {
                return back()->with('error', 'فشل حفظ الملف في النظام. يرجى التأكد من صلاحيات المجلد storage.');
            }

            $location->auditLogs()->create([
                'file_path'  => $filePath,
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
            ]);

            return back()->with('success', 'تم إضافة ملف التدقيق بنجاح!');

        } catch (\Exception $e) {
            \Log::error('Audit log upload exception: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->with('error', 'حدث خطأ غير متوقع أثناء الرفع: ' . $e->getMessage());
        }
    }

    public function deleteLog(LocationAuditLog $log)
    {
        Storage::disk('public')->delete($log->file_path);
        $log->delete();
        return back()->with('success', 'تم حذف ملف التدقيق بنجاح!');
    }
}
