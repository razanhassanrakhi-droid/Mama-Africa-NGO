<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('massage.reset_password') ?? 'Reset Password' }} - {{ app()->getLocale() == 'ar' ? 'ماما أفريكا' : 'Mama Africa' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-org.png') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-[#fed7aa] antialiased min-h-screen flex flex-col items-center justify-center p-4">

    <!-- Language Toggle -->
    <div class="absolute top-4 {{ app()->getLocale() == 'ar' ? 'left-4' : 'right-4' }}">
        @if(app()->getLocale() == 'ar')
            <a href="{{ url('change-language/en') }}" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                <span>English</span>
                <i class="fas fa-globe"></i>
            </a>
        @else
            <a href="{{ url('change-language/ar') }}" class="flex items-center gap-2 px-4 py-2 bg-white rounded-lg shadow-sm border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-globe"></i>
                <span>العربية</span>
            </a>
        @endif
    </div>

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <a href="{{ route('login') }}" class="inline-block text-gray-500 hover:text-blue-600 transition-colors mb-4 absolute top-6 {{ app()->getLocale() == 'ar' ? 'right-6' : 'left-6' }}" title="{{ __('massage.form_back_to_list') }}">
                    <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }} text-xl"></i>
                </a>
                
                <h1 class="text-2xl font-bold text-gray-900">{{ __('massage.security_verification') ?? 'Security Verification' }}</h1>
                <p class="text-gray-500 mt-2 text-sm">{{ __('massage.answer_security_question') ?? 'Answer your security question to reset your password.' }}</p>
                <div class="mt-3 inline-flex items-center gap-2 px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-semibold">
                    <i class="fas fa-user-check"></i> <span>{{ $user->name }}</span>
                </div>
            </div>

            <!-- Flash Messages -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-lg"></i>
                    <p class="font-medium text-sm">{{ session('error') }}</p>
                </div>
            @endif
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg flex items-center gap-3">
                    <i class="fas fa-check-circle text-lg"></i>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.reset.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <p class="text-sm font-medium text-gray-700 bg-orange-50 border border-orange-200 p-3 rounded-lg">{{ __('massage.answer_all_questions') ?? 'Answer all 3 security questions to reset your password.' }}</p>

                <!-- Question 1 -->
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-4">
                    <p class="text-sm font-semibold text-[#f97316] mb-2">{{ __('massage.security_question_1') ?? 'Security Question 1' }}</p>
                    <p class="text-gray-800 font-medium italic mb-3">"{{ __('massage.questions.'.$user->security_question) ?? $user->security_question }}"</p>
                    <div>
                        <input name="security_answer" type="text" placeholder="{{ __('massage.security_answer_1') ?? 'Answer 1' }}" required class="w-full py-2.5 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-shadow bg-white {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}" autocomplete="off">
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-4">
                    <p class="text-sm font-semibold text-[#f97316] mb-2">{{ __('massage.security_question_2') ?? 'Security Question 2' }}</p>
                    <p class="text-gray-800 font-medium italic mb-3">"{{ __('massage.questions.'.$user->security_question_2) ?? $user->security_question_2 }}"</p>
                    <div>
                        <input name="security_answer_2" type="text" placeholder="{{ __('massage.security_answer_2') ?? 'Answer 2' }}" required class="w-full py-2.5 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-shadow bg-white {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}" autocomplete="off">
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                    <p class="text-sm font-semibold text-[#f97316] mb-2">{{ __('massage.security_question_3') ?? 'Security Question 3' }}</p>
                    <p class="text-gray-800 font-medium italic mb-3">"{{ __('massage.questions.'.$user->security_question_3) ?? $user->security_question_3 }}"</p>
                    <div>
                        <input name="security_answer_3" type="text" placeholder="{{ __('massage.security_answer_3') ?? 'Answer 3' }}" required class="w-full py-2.5 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-shadow bg-white {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}" autocomplete="off">
                    </div>
                </div>

                <hr class="border-gray-100 my-4">

                <div>
                    <label for="password" class="block text-sm font-semibold mb-1 text-gray-700">{{ __('massage.form_new_password') ?? 'New Password' }}</label>
                    <div class="relative">
                        <input name="password" id="password" type="password" required dir="ltr" class="w-full py-3 {{ app()->getLocale() == 'ar' ? 'pl-10 pr-4 text-right' : 'pl-4 pr-10 text-left' }} rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow bg-gray-50">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'left-0 pl-3' : 'right-0 pr-3' }} flex items-center text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold mb-1 text-gray-700">{{ __('massage.form_confirm_password') ?? 'Confirm Password' }}</label>
                    <div class="relative">
                        <input name="password_confirmation" id="password_confirmation" type="password" required dir="ltr" class="w-full py-3 {{ app()->getLocale() == 'ar' ? 'pl-10 pr-4 text-right' : 'pl-4 pr-10 text-left' }} rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow bg-gray-50">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'left-0 pl-3' : 'right-0 pr-3' }} flex items-center text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                            <i class="fas fa-eye" id="password_confirmation-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full bg-[#f97316] hover:bg-[#ea580c] text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition-all flex justify-center items-center gap-2">
                        <i class="fas fa-unlock-alt"></i>
                        <span>{{ __('massage.reset_password') ?? 'Reset Password' }}</span>
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Footer info -->
        <div class="bg-gray-50 py-4 px-8 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-500">&copy; {{ app()->getLocale() == 'ar' ? strtr(date('Y'), ['0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩']) : date('Y') }} {{ app()->getLocale() == 'ar' ? 'منظمة ماما أفريكا.' : 'Mama Africa NGO.' }} {{ __('massage.all_rights_reserved') ?? 'All rights reserved.' }}</p>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
    function togglePasswordVisibility(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '-eye');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>
</body>
</html>
