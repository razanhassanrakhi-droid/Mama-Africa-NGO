<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transparency;
use App\Models\Beneficiary;
use App\Models\LocationSetting;

class TransparencyDashboardController extends Controller
{
    public function index()
    {
        return view('transparency.dashboard');
    }

    public function stream()
    {
        // For local development on Windows (php artisan serve), an endless while(true) loop 
        // will block the single-threaded server, preventing any other pages from loading.
        // The most robust solution is to send the data once and instruct the browser's EventSource 
        // to automatically reconnect. This simulates continuous streaming without exhausting server threads.

        $transparency = Transparency::first();
        
        // Fetch recent beneficiaries and apply Privacy Anonymization Rules
        $recentBeneficiaries = Beneficiary::latest()->take(5)->get()->map(function($b) {
            if (in_array(strtolower($b->sector), ['protection', 'livelihoods'])) {
                $b->name = 'Anonymous Beneficiary';
            }
            return $b;
        });

        $counters = $transparency ? [
            ['label_en' => $transparency->counter1_label_en, 'label_ar' => $transparency->counter1_label_ar, 'value' => $transparency->counter1_value],
            ['label_en' => $transparency->counter2_label_en, 'label_ar' => $transparency->counter2_label_ar, 'value' => $transparency->counter2_value],
            ['label_en' => $transparency->counter3_label_en, 'label_ar' => $transparency->counter3_label_ar, 'value' => $transparency->counter3_value],
            ['label_en' => $transparency->counter4_label_en, 'label_ar' => $transparency->counter4_label_ar, 'value' => $transparency->counter4_value],
            ['label_en' => $transparency->counter5_label_en, 'label_ar' => $transparency->counter5_label_ar, 'value' => $transparency->counter5_value],
            ['label_en' => $transparency->counter6_label_en, 'label_ar' => $transparency->counter6_label_ar, 'value' => $transparency->counter6_value],
        ] : [];

        // Dynamically assign an icon based on the category name
        foreach ($counters as &$counter) {
            // Safeguard against null labels
            $en = strtolower($counter['label_en'] ?? '');
            $ar = $counter['label_ar'] ?? '';
            
            if (strpos($en, 'water') !== false || strpos($ar, 'مياه') !== false) {
                $counter['icon'] = 'fa-droplet';
            } elseif (strpos($en, 'train') !== false || strpos($ar, 'تدريب') !== false) {
                $counter['icon'] = 'fa-chalkboard-user';
            } elseif (strpos($en, 'livelihood') !== false || strpos($ar, 'عيش') !== false) {
                $counter['icon'] = 'fa-briefcase';
            } elseif (strpos($en, 'protect') !== false || strpos($ar, 'حماية') !== false) {
                $counter['icon'] = 'fa-shield-halved';
            } elseif (strpos($en, 'nutriti') !== false || strpos($ar, 'تغذي') !== false) {
                $counter['icon'] = 'fa-bowl-food';
            } elseif (strpos($en, 'env') !== false || strpos($en, 'sanit') !== false || strpos($ar, 'بيئ') !== false || strpos($ar, 'اصحاح') !== false) {
                $counter['icon'] = 'fa-leaf';
            } else {
                $counter['icon'] = 'fa-chart-pie'; // fallback
            }
        }
        unset($counter);

        $reports = \App\Models\TransparencyReport::orderBy('year', 'desc')->get();

        $data = [
            'counters' => $counters,
            'show_counter_values' => $transparency ? (bool)$transparency->show_counter_values : true,
            'recent_beneficiaries' => $recentBeneficiaries,
            'financials' => [
                'programs' => $transparency ? (int)$transparency->financial_programs : 85,
                'operations' => $transparency ? (int)$transparency->financial_operations : 10,
                'admin' => $transparency ? (int)$transparency->financial_admin : 5,
                'percentage_clean_water' => $transparency ? (int)$transparency->percentage_clean_water : 30,
                'percentage_training' => $transparency ? (int)$transparency->percentage_training : 30,
                'percentage_nutrition' => $transparency ? (int)$transparency->percentage_nutrition : 20,
                'percentage_environment' => $transparency ? (int)$transparency->percentage_environment : 12,
            ],
            'reports' => $reports
        ];

        return response()->json($data);
    }

    public function mapData()
    {
        $locations = LocationSetting::with('auditLogs')->get();
        
        $pins = $locations->map(function($loc) {
            return [
                'id'                      => $loc->id,
                'name_en'                 => $loc->name_en,
                'name_ar'                 => $loc->name_ar,
                'latitude'                => $loc->latitude,
                'longitude'               => $loc->longitude,
                'activity_description_ar' => $loc->activity_description_ar,
                'activity_description_en' => $loc->activity_description_en,
                'status'                  => 'Active',
                'audit_logs'              => $loc->auditLogs->map(function($log) {
                    return [
                        'id'         => $log->id,
                        'file_path'  => asset('storage/' . $log->file_path),
                        'start_date' => $log->start_date,
                        'end_date'   => $log->end_date,
                    ];
                }),
            ];
        });

        return response()->json($pins);
    }
}
