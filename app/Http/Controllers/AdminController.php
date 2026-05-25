<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\News;
use App\Models\Members;
use App\Models\Inquiry;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'projects_count' => Projects::count(),
            'news_count' => News::count(),
            'members_count' => Members::count(),
            'inquiries_count' => Inquiry::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
