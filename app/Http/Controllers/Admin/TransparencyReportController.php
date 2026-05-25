<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparencyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransparencyReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'year'     => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'file_path' => 'required|file|mimes:pdf|max:20480',
        ]);

        $data = $request->except('file_path');

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('reports', 'public');
        }

        TransparencyReport::create($data);

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم إضافة التقرير بنجاح' : 'Report added successfully');
    }

    public function update(Request $request, TransparencyReport $report)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'year'     => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'file_path' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        $data = $request->except('file_path');

        if ($request->hasFile('file_path')) {
            // Delete old file
            if ($report->file_path) {
                Storage::disk('public')->delete($report->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('reports', 'public');
        }

        $report->update($data);

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم تحديث التقرير بنجاح' : 'Report updated successfully');
    }

    public function destroy(TransparencyReport $report)
    {
        if ($report->file_path) {
            Storage::disk('public')->delete($report->file_path);
        }
        $report->delete();

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم حذف التقرير بنجاح' : 'Report deleted successfully');
    }
}
