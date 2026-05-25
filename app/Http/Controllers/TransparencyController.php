<?php

namespace App\Http\Controllers;

use App\Models\Transparency;
use App\Models\TransparencyFundingSource;
use App\Models\TransparencyPartnership;
use App\Models\TransparencyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class TransparencyController extends Controller
{
    public function index()
    {
        $transparency = Transparency::first() ?? new Transparency();
        $reports = TransparencyReport::orderBy('year', 'desc')->get();
        $fundingSources = TransparencyFundingSource::orderBy('created_at', 'desc')->get();
        return view('admin.transparency.index', compact('transparency', 'reports', 'fundingSources'));
    }

    public function partnershipsIndex()
    {
        $partnerships = TransparencyPartnership::orderBy('created_at', 'desc')->get();
        return view('admin.partnerships.index', compact('partnerships'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title_en'          => 'required|string|max:255',
            'title_ar'          => 'required|string|max:255',
            'desc_en'           => 'required|string',
            'desc_ar'           => 'required|string',
            'show_counter_values' => 'nullable|boolean',
            'report_file'       => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:20480',
            'report_mode'       => 'required|in:download,view',
            'counter1_value'    => 'required|integer|min:0',
            'counter1_label_en' => 'required|string|max:255',
            'counter1_label_ar' => 'required|string|max:255',
            'counter2_value'    => 'required|integer|min:0',
            'counter2_label_en' => 'required|string|max:255',
            'counter2_label_ar' => 'required|string|max:255',
            'counter3_value'    => 'required|integer|min:0',
            'counter3_label_en' => 'required|string|max:255',
            'counter3_label_ar' => 'required|string|max:255',
            'counter4_value'    => 'required|integer|min:0',
            'counter4_label_en' => 'required|string|max:255',
            'counter4_label_ar' => 'required|string|max:255',
            'counter5_value'    => 'required|integer|min:0',
            'counter5_label_en' => 'required|string|max:255',
            'counter5_label_ar' => 'required|string|max:255',
            'counter6_value'    => 'required|integer|min:0',
            'counter6_label_en' => 'required|string|max:255',
            'counter6_label_ar' => 'required|string|max:255',
            'financial_programs'   => 'required|integer|min:0|max:100',
            'financial_operations' => 'required|integer|min:0|max:100',
            'financial_admin'      => 'required|integer|min:0|max:100',
            'percentage_clean_water' => 'required|integer|min:0|max:100',
            'percentage_training'    => 'required|integer|min:0|max:100',
            'percentage_nutrition'   => 'required|integer|min:0|max:100',
            'percentage_environment' => 'required|integer|min:0|max:100',
        ]);

        $data = $request->except('_token', '_method', 'report_file');
        $data['show_counter_values'] = $request->has('show_counter_values');

        // Handle file upload
        if ($request->hasFile('report_file')) {
            $transparency = Transparency::first();
            // Delete old file if exists
            if ($transparency && $transparency->report_file) {
                Storage::disk('public')->delete($transparency->report_file);
            }
            $path = $request->file('report_file')->store('reports', 'public');
            $data['report_file'] = $path;
        }

        $transparency = Transparency::first();
        if ($transparency) {
            $transparency->update($data);
        } else {
            Transparency::create($data);
        }

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar'
                ? 'تم حفظ بيانات قسم الشفافية بنجاح'
                : 'Transparency section updated successfully');
    }

    public function deleteFile()
    {
        $transparency = Transparency::first();
        if ($transparency && $transparency->report_file) {
            Storage::disk('public')->delete($transparency->report_file);
            $transparency->update(['report_file' => null]);
        }
        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم حذف الملف' : 'File deleted');
    }

    public function storeFundingSource(Request $request)
    {
        $request->validate([
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'icon'        => 'nullable|string|max:255',
        ]);

        TransparencyFundingSource::create($request->all());

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم إضافة جهة التمويل بنجاح' : 'Funding source added successfully');
    }

    public function updateFundingSource(Request $request, $id)
    {
        $request->validate([
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'icon'        => 'nullable|string|max:255',
        ]);

        $source = TransparencyFundingSource::findOrFail($id);
        $source->update($request->all());

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم تحديث جهة التمويل بنجاح' : 'Funding source updated successfully');
    }

    public function destroyFundingSource($id)
    {
        $source = TransparencyFundingSource::findOrFail($id);
        $source->delete();

        return redirect()->route('admin.transparency.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم حذف جهة التمويل بنجاح' : 'Funding source deleted successfully');
    }

    public function storePartnership(Request $request)
    {
        $request->validate([
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'icon'        => 'nullable|string|max:255',
        ]);

        TransparencyPartnership::create($request->all());
        
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.partnerships.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم إضافة الشريك بنجاح' : 'Partner added successfully');
    }

    public function updatePartnership(Request $request, $id)
    {
        $request->validate([
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'name_en'     => 'required|string|max:255',
            'name_ar'     => 'required|string|max:255',
            'icon'        => 'nullable|string|max:255',
        ]);

        $partnership = TransparencyPartnership::findOrFail($id);
        $partnership->update($request->all());

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.partnerships.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم تحديث الشريك بنجاح' : 'Partner updated successfully');
    }

    public function destroyPartnership($id)
    {
        $partnership = TransparencyPartnership::findOrFail($id);
        $partnership->delete();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.partnerships.index')
            ->with('success', app()->getLocale() === 'ar' ? 'تم حذف الشريك بنجاح' : 'Partner deleted successfully');
    }
}
