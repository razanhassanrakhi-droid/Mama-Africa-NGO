<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class PaymentMethodController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $paymentMethods = \App\Models\PaymentMethod::all();
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('admin.payment_methods.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name.ar' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'type' => 'required|in:bank,mobile_money,online,crypto',
            'icon' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:4096',
            'description.ar' => 'nullable|string',
            'description.en' => 'nullable|string',
            'instructions.ar' => 'nullable|string',
            'instructions.en' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $paymentMethod = new \App\Models\PaymentMethod();
        $paymentMethod->type = $validated['type'];
        $paymentMethod->icon = $validated['icon'];
        $paymentMethod->is_active = $request->has('is_active');

        $paymentMethod->setTranslation('name', 'ar', $validated['name']['ar']);
        $paymentMethod->setTranslation('name', 'en', $validated['name']['en']);
        
        if (isset($validated['description'])) {
            $paymentMethod->setTranslation('description', 'ar', $validated['description']['ar'] ?? '');
            $paymentMethod->setTranslation('description', 'en', $validated['description']['en'] ?? '');
        }

        if (isset($validated['instructions'])) {
            $paymentMethod->setTranslation('instructions', 'ar', $validated['instructions']['ar'] ?? '');
            $paymentMethod->setTranslation('instructions', 'en', $validated['instructions']['en'] ?? '');
        }

        $paymentMethod->logo = $this->uploadImage($request, 'logo', 'cropped_image', 'payment_logos', null);

        $paymentMethod->save();

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method created successfully.');
    }

    public function edit(\App\Models\PaymentMethod $paymentMethod)
    {
        return view('admin.payment_methods.edit', compact('paymentMethod'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\PaymentMethod $paymentMethod)
    {
        $validated = $request->validate([
            'name.ar' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'type' => 'required|in:bank,mobile_money,online,crypto',
            'icon' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:4096',
            'description.ar' => 'nullable|string',
            'description.en' => 'nullable|string',
            'instructions.ar' => 'nullable|string',
            'instructions.en' => 'nullable|string',
        ]);

        $paymentMethod->type = $validated['type'];
        $paymentMethod->icon = $validated['icon'];
        $paymentMethod->is_active = $request->has('is_active');

        $paymentMethod->setTranslation('name', 'ar', $validated['name']['ar']);
        $paymentMethod->setTranslation('name', 'en', $validated['name']['en']);
        
        if (isset($validated['description'])) {
            $paymentMethod->setTranslation('description', 'ar', $validated['description']['ar'] ?? '');
            $paymentMethod->setTranslation('description', 'en', $validated['description']['en'] ?? '');
        }

        if (isset($validated['instructions'])) {
            $paymentMethod->setTranslation('instructions', 'ar', $validated['instructions']['ar'] ?? '');
            $paymentMethod->setTranslation('instructions', 'en', $validated['instructions']['en'] ?? '');
        }

        $paymentMethod->logo = $this->uploadImage($request, 'logo', 'cropped_image', 'payment_logos', $paymentMethod->logo);

        $paymentMethod->save();

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method updated successfully.');
    }

    public function destroy(\App\Models\PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method deleted successfully.');
    }
}
