<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // عرض صفحة اللوقن
    public function showLogin()
    {
        // dd('y');
        return view('login');
    }

    // معالجة اللوقن
    public function login(Request $request)
    {
        // جلب البيانات من الفورم
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // اعادة توليد session بعد تسجيل الدخول
            $request->session()->regenerate();

            // توجيه للداشبورد
            return redirect()->route('admin.dashboard');
        }

        // لو البيانات غلط
        return back()->with('error', __('massage.invalid_login_credentials') ?? 'بيانات الدخول غير صحيحة');
    }

    public function logout()
    {
        $locale = request()->session()->get('locale'); // Preserve locale before clearing
        
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        if ($locale) {
            request()->session()->put('locale', $locale); // Restore locale
        }

        return redirect()->route('login');
    }

    // Password Recovery - Step 1: Show Forgot Form
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Password Recovery - Step 2: Verify User & Show Security Question
    public function verifyUser(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
        ]);

        $user = User::where('name', $request->login)
                    ->orWhere('email', $request->login)
                    ->first();

        if (!$user) {
            return back()->with('error', __('massage.user_not_found') ?? 'User not found.');
        }

        if (empty($user->security_question) || empty($user->security_question_2) || empty($user->security_question_3)) {
            return back()->with('error', __('massage.no_security_question') ?? 'No security question set for this account. Please contact an administrator.');
        }

        return view('auth.reset-password', compact('user'));
    }

    // Password Recovery - Step 3: Verify Answer & Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'security_answer' => 'required|string',
            'security_answer_2' => 'required|string',
            'security_answer_3' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($request->user_id);

        // Check if the hashed security answers match
        if (!Hash::check(strtolower(trim($request->security_answer)), $user->security_answer) || 
            !Hash::check(strtolower(trim($request->security_answer_2)), $user->security_answer_2) || 
            !Hash::check(strtolower(trim($request->security_answer_3)), $user->security_answer_3)) {
            return back()->with('error', __('massage.incorrect_security_answer') ?? 'Incorrect security answer.');
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', __('massage.password_reset_success') ?? 'Password reset successfully. You can now log in.');
    }
}