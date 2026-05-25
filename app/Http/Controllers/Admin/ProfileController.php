<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileSetting;
use App\Models\ProfileItem;

class ProfileController extends Controller
{
    public function index()
    {
        $setting = ProfileSetting::first();
        if (!$setting) {
            $setting = new ProfileSetting();
        }

        $items = ProfileItem::orderBy('sort_order', 'asc')->get()->groupBy('type');

        return view('admin.profile.index', compact('setting', 'items'));
    }

    public function updateSettings(Request $request)
    {
        $setting = ProfileSetting::first();
        if (!$setting) {
            $setting = new ProfileSetting();
        }

        $data = $request->validate([
            // Hero
            'hero_title_ar' => 'nullable|string',
            'hero_title_en' => 'nullable|string',
            'hero_subtitle_ar' => 'nullable|string',
            'hero_subtitle_en' => 'nullable|string',
            'hero_pill1_icon' => 'nullable|string',
            'hero_pill1_text_ar' => 'nullable|string',
            'hero_pill1_text_en' => 'nullable|string',
            'hero_pill2_icon' => 'nullable|string',
            'hero_pill2_text_ar' => 'nullable|string',
            'hero_pill2_text_en' => 'nullable|string',
            'hero_pill3_icon' => 'nullable|string',
            'hero_pill3_text_ar' => 'nullable|string',
            'hero_pill3_text_en' => 'nullable|string',

            // Objectives
            'objectives_title_ar' => 'nullable|string',
            'objectives_title_en' => 'nullable|string',

            // Timeline
            'timeline_title_ar' => 'nullable|string',
            'timeline_title_en' => 'nullable|string',

            // Journey
            'journey_title_ar' => 'nullable|string',
            'journey_title_en' => 'nullable|string',
            'journey_pos_title_ar' => 'nullable|string',
            'journey_pos_title_en' => 'nullable|string',
            'journey_pos_desc_ar' => 'nullable|string',
            'journey_pos_desc_en' => 'nullable|string',
            'journey_pos_pill_icon' => 'nullable|string',
            'journey_pos_pill_ar' => 'nullable|string',
            'journey_pos_pill_en' => 'nullable|string',
            'journey_neg_title_ar' => 'nullable|string',
            'journey_neg_title_en' => 'nullable|string',
            'journey_neg_desc_ar' => 'nullable|string',
            'journey_neg_desc_en' => 'nullable|string',

            // Capacity
            'capacity_title_ar' => 'nullable|string',
            'capacity_title_en' => 'nullable|string',
            'capacity_desc_ar' => 'nullable|string',
            'capacity_desc_en' => 'nullable|string',
            'capacity_summary_title_ar' => 'nullable|string',
            'capacity_summary_title_en' => 'nullable|string',
            'capacity_summary_desc_ar' => 'nullable|string',
            'capacity_summary_desc_en' => 'nullable|string',
            'capacity_internal_title_ar' => 'nullable|string',
            'capacity_internal_title_en' => 'nullable|string',
            'capacity_external_title_ar' => 'nullable|string',
            'capacity_external_title_en' => 'nullable|string',

            // Snapshot
            'snapshot_title_ar' => 'nullable|string',
            'snapshot_title_en' => 'nullable|string',

            // SWOT
            'swot_title_ar' => 'nullable|string',
            'swot_title_en' => 'nullable|string',
            'swot_strengths_title_ar' => 'nullable|string',
            'swot_strengths_title_en' => 'nullable|string',
            'swot_strengths_icon' => 'nullable|string',
            'swot_weaknesses_title_ar' => 'nullable|string',
            'swot_weaknesses_title_en' => 'nullable|string',
            'swot_weaknesses_icon' => 'nullable|string',
            'swot_opportunities_title_ar' => 'nullable|string',
            'swot_opportunities_title_en' => 'nullable|string',
            'swot_opportunities_icon' => 'nullable|string',
            'swot_needs_title_ar' => 'nullable|string',
            'swot_needs_title_en' => 'nullable|string',
            'swot_needs_icon' => 'nullable|string',

            // Methodology
            'methodology_title_ar' => 'nullable|string',
            'methodology_title_en' => 'nullable|string',
            'methodology_subtitle_ar' => 'nullable|string',
            'methodology_subtitle_en' => 'nullable|string',
            'methodology_grants_title_ar' => 'nullable|string',
            'methodology_grants_title_en' => 'nullable|string',
            'methodology_grants_icon' => 'nullable|string',
            'methodology_me_title_ar' => 'nullable|string',
            'methodology_me_title_en' => 'nullable|string',
            'methodology_me_icon' => 'nullable|string',
            'methodology_cross_title_ar' => 'nullable|string',
            'methodology_cross_title_en' => 'nullable|string',
            'methodology_cross_desc_ar' => 'nullable|string',
            'methodology_cross_desc_en' => 'nullable|string',

            // Who We Serve
            'serve_title_ar' => 'nullable|string',
            'serve_title_en' => 'nullable|string',
            'serve_subtitle_ar' => 'nullable|string',
            'serve_subtitle_en' => 'nullable|string',
            'serve_desc_ar' => 'nullable|string',
            'serve_desc_en' => 'nullable|string',

            // Contact
            'contact_title_ar' => 'nullable|string',
            'contact_title_en' => 'nullable|string',
            'contact_subtitle_ar' => 'nullable|string',
            'contact_subtitle_en' => 'nullable|string',
            'contact_desc_ar' => 'nullable|string',
            'contact_desc_en' => 'nullable|string',
            'contact_name_ar' => 'nullable|string',
            'contact_name_en' => 'nullable|string',
            'contact_position_ar' => 'nullable|string',
            'contact_position_en' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'contact_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $setting->fill($request->except(['contact_photo', 'remove_contact_photo']));

        if ($request->hasFile('contact_photo')) {
            // Delete old photo if exists
            if ($setting->contact_photo && file_exists(public_path($setting->contact_photo))) {
                @unlink(public_path($setting->contact_photo));
            }
            $file = $request->file('contact_photo');
            $filename = 'contact_' . time() . '.' . $file->getClientOriginalExtension();
            // Ensure directory exists
            if (!file_exists(public_path('uploads/profile'))) {
                mkdir(public_path('uploads/profile'), 0755, true);
            }
            $file->move(public_path('uploads/profile'), $filename);
            $setting->contact_photo = 'uploads/profile/' . $filename;
        }

        if ($request->has('remove_contact_photo')) {
            if ($setting->contact_photo && file_exists(public_path($setting->contact_photo))) {
                @unlink(public_path($setting->contact_photo));
            }
            $setting->contact_photo = null;
        }

        $setting->save();

        // Process SWOT Items Inline
        if ($request->has('swot_items')) {
            foreach ($request->input('swot_items') as $type => $itemsList) {
                if (is_array($itemsList)) {
                    $sortOrder = 1;
                    foreach ($itemsList as $itemData) {
                        if (!empty($itemData['value_ar']) || !empty($itemData['value_en'])) {
                            if (!empty($itemData['id'])) {
                                // Update existing item
                                $existingItem = \App\Models\ProfileItem::find($itemData['id']);
                                if ($existingItem) {
                                    $existingItem->update([
                                        'value_ar' => $itemData['value_ar'] ?? '',
                                        'value_en' => $itemData['value_en'] ?? '',
                                        'sort_order' => $sortOrder++
                                    ]);
                                }
                            } else {
                                // Create new item
                                \App\Models\ProfileItem::create([
                                    'type' => $type,
                                    'value_ar' => $itemData['value_ar'] ?? '',
                                    'value_en' => $itemData['value_en'] ?? '',
                                    'sort_order' => $sortOrder++
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->back()->with('success', app()->getLocale() == 'ar' ? 'تم تحديث الإعدادات العامة بنجاح!' : 'General profile settings updated successfully!');
    }

    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'icon' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'value_ar' => 'nullable|string',
            'value_en' => 'nullable|string',
            'extra_value_ar' => 'nullable|string',
            'extra_value_en' => 'nullable|string',
            'number_value' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
        ]);

        ProfileItem::create($data);

        return redirect()->back()->with('success', app()->getLocale() == 'ar' ? 'تم إضافة العنصر بنجاح!' : 'Item added successfully!');
    }

    public function updateItem(Request $request, $id)
    {
        $item = ProfileItem::findOrFail($id);

        $data = $request->validate([
            'icon' => 'nullable|string',
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'value_ar' => 'nullable|string',
            'value_en' => 'nullable|string',
            'extra_value_ar' => 'nullable|string',
            'extra_value_en' => 'nullable|string',
            'number_value' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($data);

        return redirect()->back()->with('success', app()->getLocale() == 'ar' ? 'تم تحديث العنصر بنجاح!' : 'Item updated successfully!');
    }

    public function destroyItem($id)
    {
        $item = ProfileItem::findOrFail($id);
        $item->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => app()->getLocale() == 'ar' ? 'تم حذف العنصر بنجاح!' : 'Item deleted successfully!'
            ]);
        }

        return redirect()->back()->with('success', app()->getLocale() == 'ar' ? 'تم حذف العنصر بنجاح!' : 'Item deleted successfully!');
    }
}
