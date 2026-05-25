<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        abort_if(!auth()->user()->isAdmin(), 403, __('massage.unauthorized') ?? 'Unauthorized Action');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        abort_if(!auth()->user()->isAdmin(), 403, __('massage.unauthorized') ?? 'Unauthorized Action');
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        abort_if(!auth()->user()->isAdmin(), 403, __('massage.unauthorized') ?? 'Unauthorized Action');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,employee',
            'security_question' => 'required|string',
            'security_answer' => 'required|string',
            'security_question_2' => 'required|string',
            'security_answer_2' => 'required|string',
            'security_question_3' => 'required|string',
            'security_answer_3' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'original_password' => $request->password,
            'role' => $request->role,
            'security_question' => $request->security_question,
            'security_answer' => Hash::make(strtolower(trim($request->security_answer))),
            'security_question_2' => $request->security_question_2,
            'security_answer_2' => Hash::make(strtolower(trim($request->security_answer_2))),
            'security_question_3' => $request->security_question_3,
            'security_answer_3' => Hash::make(strtolower(trim($request->security_answer_3))),
        ]);

        return redirect()->route('admin.users.index')->with('success', __('massage.user_created_successfully') ?? 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        // Allow if user is admin, OR if the user is editing their own profile
        abort_if(!auth()->user()->isAdmin() && auth()->id() !== $user->id, 403, __('massage.unauthorized') ?? 'Unauthorized Action');
        
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        // Allow if user is admin, OR if the user is editing their own profile
        abort_if(!auth()->user()->isAdmin() && auth()->id() !== $user->id, 403, __('massage.unauthorized') ?? 'Unauthorized Action');

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'security_question' => 'nullable|string',
            'security_answer' => 'nullable|string',
            'security_question_2' => 'nullable|string',
            'security_answer_2' => 'nullable|string',
            'security_question_3' => 'nullable|string',
            'security_answer_3' => 'nullable|string',
        ];

        // If the user is an admin, they can change the role. If not, ignore the role field.
        if (auth()->user()->isAdmin()) {
            $rules['role'] = 'required|in:admin,employee';
        }

        // If password is provided, validate it
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';

            // Employees MUST supply the old password to change their own password
            if (auth()->user()->isEmployee()) {
                $rules['old_password'] = 'required|string';
            }
        }

        $request->validate($rules);

        // If employee is changing their password, verify the old one
        if ($request->filled('password') && auth()->user()->isEmployee()) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->with('error', __('massage.incorrect_old_password') ?? 'Incorrect old password')->withInput();
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        
        if (auth()->user()->isAdmin()) {
            $user->role = $request->role;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->original_password = $request->password;
        }

        // Only update security question/answer if a new question/answer was provided
        if ($request->filled('security_question') && $request->filled('security_answer')) {
            $user->security_question = $request->security_question;
            $user->security_answer = Hash::make(strtolower(trim($request->security_answer)));
        }

        if ($request->filled('security_question_2') && $request->filled('security_answer_2')) {
            $user->security_question_2 = $request->security_question_2;
            $user->security_answer_2 = Hash::make(strtolower(trim($request->security_answer_2)));
        }

        if ($request->filled('security_question_3') && $request->filled('security_answer_3')) {
            $user->security_question_3 = $request->security_question_3;
            $user->security_answer_3 = Hash::make(strtolower(trim($request->security_answer_3)));
        }

        $user->save();

        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.users.index')->with('success', __('massage.user_updated_successfully') ?? 'User updated successfully.');
        } else {
            return back()->with('success', __('massage.user_updated_successfully') ?? 'User updated successfully.');
        }
    }

    /**
     * Update the role of the specified user from the index table.
     */
    public function updateRole(Request $request, User $user)
    {
        abort_if(!auth()->user()->isAdmin(), 403, __('massage.unauthorized') ?? 'Unauthorized Action');

        // Prevent admin from accidentally changing their own role from the table dropdown to avoid lockouts
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot change your own role from this view.');
        }

        $request->validate([
            'role' => 'required|in:admin,employee',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', __('massage.user_updated_successfully') ?? 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        abort_if(!auth()->user()->isAdmin(), 403, __('massage.unauthorized') ?? 'Unauthorized Action');
        
        // Prevent user from deleting themselves
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')->with('error', __('massage.cannot_delete_self') ?? 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', __('massage.user_deleted_successfully') ?? 'User deleted successfully.');
    }
}
