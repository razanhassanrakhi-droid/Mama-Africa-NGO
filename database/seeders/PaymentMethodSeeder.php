<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            [
                'name' => 'Bank Transfer',
                'type' => 'bank',
                'icon' => 'fa-solid fa-building-columns',
                'description' => 'Transfer directly to our bank account.',
                'instructions' => 'Bank Name: African Development Bank\nAccount Name: Mama Africa NGO\nAccount Number: 1234567890\nSWIFT: ADBXXXXX\nReference: Your Name',
                'is_active' => true,
            ],
            [
                'name' => 'Mobile Money (MTN)',
                'type' => 'mobile_money',
                'icon' => 'fa-solid fa-mobile-screen-button',
                'description' => 'Donate via MTN Mobile Money.',
                'instructions' => 'Dial *165#\nSelect Payments\nEnter Merchant Code: 123456\nEnter Amount\nReference: Donation',
                'is_active' => true,
            ],
            [
                'name' => 'Mobile Money (Airtel)',
                'type' => 'mobile_money',
                'icon' => 'fa-solid fa-mobile-screen',
                'description' => 'Donate via Airtel Money.',
                'instructions' => 'Dial *185#\nSelect Pay Bill\nEnter Merchant Code: 987654\nEnter Amount',
                'is_active' => true,
            ],
            [
                'name' => 'Online Card Payment',
                'type' => 'online',
                'icon' => 'fa-regular fa-credit-card',
                'description' => 'Secure payment via Credit/Debit Card.',
                'instructions' => 'Redirecting to secure payment gateway...',
                'is_active' => false, // Future integration
            ],
        ];

        foreach ($methods as $method) {
            PaymentMethod::updateOrCreate(['name' => $method['name']], $method);
        }
    }
}
