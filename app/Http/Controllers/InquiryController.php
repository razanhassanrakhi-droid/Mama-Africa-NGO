<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string|min:5|max:2000',
        ]);

        Inquiry::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'message'   => $request->message,
        ]);

        return redirect(url()->previous() . '#contact')->with('success', 'تم إرسال رسالتك بنجاح');
    }
    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }
  public function destroy(Inquiry $inquiry)
{
    $inquiry->delete();

    return redirect()->route('admin.inquiries.index')
                     ->with('success', 'تم حذف الاستفسار بنجاح.');
}
}
