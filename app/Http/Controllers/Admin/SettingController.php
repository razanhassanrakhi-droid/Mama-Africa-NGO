<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'stripe_secret' => 'required_with:enable_stripe',
            'flutterwave_secret' => 'required_with:enable_flutterwave',
            'paystack_secret' => 'required_with:enable_paystack',
        ], [
            'stripe_secret.required_with' => app()->getLocale() == 'ar' ? 'مفتاح Stripe مطلوب عند تفعيل البوابة.' : 'Stripe Secret is required when enabled.',
            'flutterwave_secret.required_with' => app()->getLocale() == 'ar' ? 'مفتاح Flutterwave مطلوب عند تفعيل البوابة.' : 'Flutterwave Secret is required when enabled.',
            'paystack_secret.required_with' => app()->getLocale() == 'ar' ? 'مفتاح Paystack مطلوب عند تفعيل البوابة.' : 'Paystack Secret is required when enabled.',
        ]);

        $data = $request->except('_token');

        // Handle checkboxes
        $data['enable_stripe'] = $request->has('enable_stripe') ? '1' : '0';
        $data['enable_flutterwave'] = $request->has('enable_flutterwave') ? '1' : '0';
        $data['enable_paystack'] = $request->has('enable_paystack') ? '1' : '0';

        foreach ($data as $key => $value) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Sync with PaymentMethods table so they appear transparently on the frontend
        $gateways = [
            'stripe' => ['name' => 'Stripe', 'icon' => 'fab fa-stripe', 'desc' => 'Credit / Debit Card'],
            'flutterwave' => ['name' => 'Flutterwave', 'icon' => 'fas fa-money-check-alt', 'desc' => 'Card / Mobile Money'],
            'paystack' => ['name' => 'Paystack', 'icon' => 'fas fa-credit-card', 'desc' => 'Secure Online Payment'],
        ];

        foreach ($gateways as $key => $info) {
            \App\Models\PaymentMethod::updateOrCreate(
                ['name' => $info['name'], 'type' => 'online'],
                [
                    'is_active' => $data['enable_'.$key] == '1',
                    'icon' => $info['icon'],
                    'description' => $info['desc']
                ]
            );
        }

        return redirect()->route('admin.settings.index')->with('success', app()->getLocale() == 'ar' ? 'تم حفظ الإعدادات بنجاح.' : 'Settings updated successfully.');
    }
}
