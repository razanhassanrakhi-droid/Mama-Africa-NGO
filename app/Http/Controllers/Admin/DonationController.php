<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Donation;
use Barryvdh\DomPDF\Facade\Pdf;
use ArPHP\I18N\Arabic;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::with('paymentMethod')->latest();

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $donations = $query->paginate(15)->withQueryString();

        return view('admin.donations.index', compact('donations'));
    }

    public function exportPdf(Request $request)
    {
        $query = Donation::with('paymentMethod')->latest();

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $donations = $query->get();
        
        // Arabic Reshaping for PDF
        $arabic = new Arabic();
        
        foreach ($donations as $donation) {
            // Reshape donor name if it's Arabic
            if ($this->hasArabic($donation->donor_name)) {
                $donation->donor_name = $arabic->utf8Glyphs($donation->donor_name);
            }
            
            // Reshape payment method name if it's Arabic
            if ($donation->paymentMethod && $this->hasArabic($donation->paymentMethod->name)) {
                $donation->paymentMethod->name = $arabic->utf8Glyphs($donation->paymentMethod->name);
            }
        }

        $totalAmount = $donations->sum('amount');
        
        $dateRange = [
            'from' => $request->from_date ?: null,
            'to' => $request->to_date ?: null,
        ];

        // Reshape static labels for the PDF template
        $labels = [
            'report_title' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'تقرير سجل التبرعات' : 'Donations Record Report'),
            'generated_on' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'تاريخ الاستخراج:' : 'Generated on:'),
            'summary_title' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'ملخص التقرير' : 'Report Summary'),
            'period' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'الفترة:' : 'Period:'),
            'total_count' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'إجمالي عدد التبرعات:' : 'Total Donations:'),
            'total_amount' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'إجمالي المبالغ:' : 'Total Amount:'),
            'donor' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'المتبرع' : 'Donor'),
            'amount' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'المبلغ' : 'Amount'),
            'method' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'طريقة الدفع' : 'Method'),
            'status' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'الحالة' : 'Status'),
            'date' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'التاريخ' : 'Date'),
            'footer' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'جميع الحقوق محفوظة' : 'All rights reserved'),
            'to' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'إلى' : 'to'),
            'all_records' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'كافة السجلات' : 'All records'),
            'verifiable_total' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'الإجمالي القابل للتحقق:' : 'Verifiable Total:'),
            'statuses' => [
                'confirmed' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'مؤكد' : 'Confirmed'),
                'pending' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'قيد الانتظار' : 'Pending'),
                'failed' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'فشل' : 'Failed'),
                'refunded' => $arabic->utf8Glyphs(app()->getLocale() == 'ar' ? 'مسترد' : 'Refunded'),
            ]
        ];

        $pdf = Pdf::loadView('admin.donations.pdf', compact('donations', 'totalAmount', 'dateRange', 'labels'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('donations_report_' . now()->format('Y_m_d_His') . '.pdf');
    }

    /**
     * Helper to detect if string contains Arabic characters
     */
    private function hasArabic($string)
    {
        return preg_match('/\p{Arabic}/u', $string);
    }

    public function show(\App\Models\Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function updateStatus(\Illuminate\Http\Request $request, \App\Models\Donation $donation)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,failed,refunded',
        ]);

        $donation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Donation status updated successfully.');
    }
}
