<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('massage.login') ?? 'Login' }} - {{ app()->getLocale() == 'ar' ? 'ماما أفريكا' : 'Mama Africa' }}</title>
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

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="p-8">
            <!-- Top Actions (Back & Language) -->
            <div class="flex justify-between items-center mb-6">
                <!-- Back Button -->
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-[#f97316] transition-colors" title="{{ __('massage.form_back_to_list') }}">
                    <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }} text-xl"></i>
                </a>

                <!-- Language Toggle -->
                <div>
                    @if(app()->getLocale() == 'ar')
                        <a href="{{ url('change-language/en') }}" class="flex items-center gap-1.5 px-3 py-1.5 bg-gray-50 hover:bg-gray-100 rounded-full border border-gray-200 text-gray-700 text-sm font-semibold transition-colors">
                            <i class="fas fa-globe"></i>
                            <span>English</span>
                        </a>
                    @else
                        <a href="{{ url('change-language/ar') }}" class="flex items-center gap-1.5 px-3 py-1.5 bg-gray-50 hover:bg-gray-100 rounded-full border border-gray-200 text-gray-700 text-sm font-semibold transition-colors">
                            <span>العربية</span>
                            <i class="fas fa-globe"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Logo Section -->
            <div class="text-center mb-8">
                <div class="flex flex-col items-center justify-center">
                    <img src="{{ asset('images/favicon-org.png') }}" class="h-20 w-auto mb-4 object-contain" alt="Mama Africa Logo">
                    <h1 class="text-2xl font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'ماما أفريكا' : 'Mama Africa' }}</h1>
                    <p class="text-gray-500 mt-1">{{ __('massage.login_description') ?? 'Access the control panel' }}</p>
                </div>
            </div>

            <!-- Flash Error Message -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-lg"></i>
                    <p class="font-medium text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="username" class="block text-sm font-semibold mb-1 text-gray-700">{{ __('massage.username') ?? 'Username' }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-user"></i>
                        </div>
                        <input name="name" type="text" id="username" placeholder="{{ __('massage.enter_username') ?? 'Enter your username' }}" required class="w-full py-3 {{ app()->getLocale() == 'ar' ? 'pr-10 pl-4' : 'pl-10 pr-4' }} rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow bg-gray-50">
                    </div>
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-semibold mb-1 text-gray-700">{{ __('massage.form_password') ?? 'Password' }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input name="password" id="password" type="password" placeholder="{{ __('massage.enter_password') ?? 'Enter your password' }}" required dir="ltr" class="w-full py-3 {{ app()->getLocale() == 'ar' ? 'pl-10 pr-10 text-right' : 'pl-10 pr-10 text-left' }} rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow bg-gray-50">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'left-0 pl-3' : 'right-0 pr-3' }} flex items-center text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                    <div class="mt-2 flex {{ app()->getLocale() == 'ar' ? 'justify-start' : 'justify-end' }}">
                        <a href="{{ route('password.forgot') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors">{{ __('massage.forgot_password') ?? 'Forgot password?' }}</a>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full bg-[#f97316] hover:bg-[#ea580c] text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition-all flex justify-center items-center gap-2">
                        <span>{{ __('massage.login') ?? 'Login' }}</span>
                        <i class="fas fa-sign-in-alt"></i>
                    </button>
                    <a href="{{ url('/') }}" class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-xl shadow-sm transition-all flex justify-center items-center gap-2 text-center">
                        <i class="fas fa-home"></i>
                        <span>{{ __('massage.cancel_and_return') ?? 'Cancel & Return Home' }}</span>
                    </a>
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