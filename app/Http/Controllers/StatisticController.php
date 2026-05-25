<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Statistic;

class StatisticController extends Controller
{
    public function index()
    {
        $statistic = Statistic::first();
        return view('admin.statistics.index', compact('statistic'));
    }

    public function update(Request $request)
    {
        $statistic = Statistic::first();
        if (!$statistic) {
            $statistic = new Statistic();
        }

        $data = $request->validate([
            'cleanwater_value' => 'required|string|max:255',
            'cleanwater_text_ar' => 'required|string|max:255',
            'cleanwater_text_en' => 'required|string|max:255',
            'education_value' => 'required|string|max:255',
            'education_text_ar' => 'required|string|max:255',
            'education_text_en' => 'required|string|max:255',
            'villages_value' => 'required|string|max:255',
            'villages_text_ar' => 'required|string|max:255',
            'villages_text_en' => 'required|string|max:255',
            'funds_value' => 'required|string|max:255',
            'funds_text_ar' => 'required|string|max:255',
            'funds_text_en' => 'required|string|max:255',
        ]);

        $statistic->fill($data);
        $statistic->save();

        return redirect()->back()->with('success', 'Statistics updated successfully!');
    }
}
