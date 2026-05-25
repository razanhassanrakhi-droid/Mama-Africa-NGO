<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('massage.forgot_password') ?? 'Forgot Password' }} - {{ app()->getLocale() == 'ar' ? 'ماما أفريكا' : 'Mama Africa' }}</title>
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
                
                <div class="flex flex-col items-center justify-center">
                    <img src="{{ asset('images/favicon-org.png') }}" class="h-20 w-auto mb-4 object-contain" alt="Mama Africa Logo">
                    <h1 class="text-2xl font-bold text-gray-900">{{ __('massage.forgot_password') ?? 'Forgot Password' }}</h1>
                    <p class="text-gray-500 mt-2 text-sm">{{ __('massage.forgot_password_desc') ?? 'Enter your username or email and we will prompt your security question.' }}</p>
                </div>
            </div>

            <!-- Flash Message -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-lg"></i>
                    <p class="font-medium text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.verify.user') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="login" class="block text-sm font-semibold mb-1 text-gray-700">{{ __('massage.username_or_email') ?? 'Username or Email' }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-3' : 'left-0 pl-3' }} flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <input name="login" type="text" id="login" placeholder="{{ __('massage.enter_username') ?? 'Enter your username' }}" required class="w-full py-3 {{ app()->getLocale() == 'ar' ? 'pr-10 pl-4 text-right' : 'pl-10 pr-4 text-left' }} rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-shadow bg-gray-50" value="{{ old('login') }}">
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full bg-[#f97316] hover:bg-[#ea580c] text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg transition-all flex justify-center items-center gap-2">
                        <span>{{ __('massage.continue') ?? 'Continue' }}</span>
                        <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i>
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Footer info -->
        <div class="bg-gray-50 py-4 px-8 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-500">&copy; {{ app()->getLocale() == 'ar' ? strtr(date('Y'), ['0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩']) : date('Y') }} {{ app()->getLocale() == 'ar' ? 'منظمة ماما أفريكا.' : 'Mama Africa NGO.' }} {{ __('massage.all_rights_reserved') ?? 'All rights reserved.' }}</p>
        </div>
    </div>
</body>
</html>
