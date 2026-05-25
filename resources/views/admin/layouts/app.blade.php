<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('massage.title') ?? 'Admin Dashboard')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-org.png') }}">
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Cairo for Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #888; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }
        
        .sidebar { transition: transform 0.3s ease-in-out; }
    </style>
    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <style>
        .cropper-container { max-height: 350px; }
        .cropper-view-box, .cropper-face { transition: border-radius 0.3s ease; }
        .cropper-circular .cropper-view-box,
        .cropper-circular .cropper-face { border-radius: 50%; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 text-gray-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full overflow-hidden w-full relative z-0">
        <!-- Top Header -->
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 border-b border-gray-200">
            <div class="flex items-center gap-4">
                <button id="sidebarToggle" class="text-gray-600 hover:text-blue-600 focus:outline-none lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-bold text-gray-800 hidden sm:block">@yield('header', __('massage.title') ?? 'Dashboard')</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Language Toggle -->
                <div class="relative">
                    <a href="{{ url('change-language/' . (app()->getLocale() == 'ar' ? 'en' : 'ar')) }}" 
                       class="text-gray-600 hover:text-blue-600 text-sm font-semibold flex items-center gap-1">
                        <i class="fas fa-globe"></i>
                        {{ app()->getLocale() == 'ar' ? 'English' : 'عربي' }}
                    </a>
                </div>

                <!-- User Dropdown (Simulated) -->
                <div class="relative flex items-center gap-2 border-s border-gray-300 ps-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                        A
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold" title="{{ __('massage.logout') ?? 'Logout' }}">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebarBackdrop" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-10 hidden lg:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarBackdrop = document.getElementById('sidebarBackdrop');
            const isRtl = document.documentElement.dir === 'rtl';
            
            function toggleSidebar() {
                const transformClass = isRtl ? 'translate-x-full' : '-translate-x-full';
                sidebar.classList.toggle(transformClass);
                sidebarBackdrop.classList.toggle('hidden');
            }

            if(sidebarToggle && sidebar && sidebarBackdrop) {
                sidebarToggle.addEventListener('click', toggleSidebar);
                sidebarBackdrop.addEventListener('click', toggleSidebar);
            }
        });
    </script>
    <!-- Global Cropper Modal -->
    <div id="globalCropperModal" class="fixed inset-0 z-[100] hidden bg-black bg-opacity-75 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl flex flex-col transform transition-all" style="max-height: 92vh;">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-crop-alt"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ app()->getLocale() == 'ar' ? 'تعديل وقص الصورة' : 'Edit & Crop Image' }}</h3>
                        <p class="text-xs text-gray-500">{{ app()->getLocale() == 'ar' ? 'اختر نمط القص المناسب' : 'Choose your preferred crop style' }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeGlobalCropper()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="p-4 bg-gray-50 flex flex-col items-center gap-4 overflow-y-auto flex-1">
                <!-- Selectors -->
                <div class="flex bg-white p-1 rounded-xl shadow-sm border border-gray-200 w-full max-w-xs">
                    <button type="button" onclick="setCropMode('normal')" id="btn-crop-normal" class="flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 bg-blue-600 text-white shadow-sm">
                        <i class="fas fa-expand"></i> {{ app()->getLocale() == 'ar' ? 'عادي' : 'Normal' }}
                    </button>
                    <button type="button" onclick="setCropMode('circular')" id="btn-crop-circular" class="flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-circle"></i> {{ app()->getLocale() == 'ar' ? 'دائري' : 'Circular' }}
                    </button>
                </div>

                <div class="w-full bg-white rounded-xl border border-gray-200 overflow-hidden shadow-inner flex justify-center items-center" style="min-height:220px; max-height:350px;">
                    <img id="globalCropperImage" src="" alt="To crop" class="max-w-full">
                </div>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center bg-white flex-shrink-0 shadow-[0_-2px_8px_rgba(0,0,0,0.06)]">
                <button type="button" onclick="closeGlobalCropper()" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors font-bold text-sm">
                    {{ app()->getLocale() == 'ar' ? 'إلغاء' : 'Cancel' }}
                </button>
                <button type="button" onclick="applyGlobalCrop()" class="px-8 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-check"></i> {{ app()->getLocale() == 'ar' ? 'تطبيق القص' : 'Apply Crop' }}
                </button>
            </div>
        </div>
    </div>

    <!-- Cropper Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
        let globalCropper = null;
        let currentCropMode = 'normal';
        let currentCropConfig = null;

        function openGlobalCropper(imageSrc, config) {
            currentCropConfig = config;
            const modal = document.getElementById('globalCropperModal');
            const img = document.getElementById('globalCropperImage');
            
            img.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Set initial mode
            setCropMode('normal');
        }

        function setCropMode(mode) {
            currentCropMode = mode;
            const img = document.getElementById('globalCropperImage');
            const btnNormal = document.getElementById('btn-crop-normal');
            const btnCircular = document.getElementById('btn-crop-circular');
            const cropperContainer = document.querySelector('.cropper-container');

            // UI Update
            if (mode === 'circular') {
                btnCircular.className = "flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 bg-blue-600 text-white shadow-sm";
                btnNormal.className = "flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 text-gray-600 hover:bg-gray-50";
            } else {
                btnNormal.className = "flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 bg-blue-600 text-white shadow-sm";
                btnCircular.className = "flex-1 py-2 px-4 rounded-lg text-sm font-bold transition-all flex items-center justify-center gap-2 text-gray-600 hover:bg-gray-50";
            }

            if (globalCropper) { globalCropper.destroy(); }

            const options = {
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                restore: false,
                guides: true,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
            };

            if (mode === 'circular') {
                options.aspectRatio = 1;
                document.getElementById('globalCropperModal').classList.add('cropper-circular');
            } else {
                options.aspectRatio = NaN;
                document.getElementById('globalCropperModal').classList.remove('cropper-circular');
            }

            globalCropper = new Cropper(img, options);
        }

        function applyGlobalCrop() {
            if (!globalCropper) return;

            const canvas = globalCropper.getCroppedCanvas({
                width: 1920,  // Full HD
                height: 1920, // Full HD
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });

            const base64Data = canvas.toDataURL('image/jpeg', 0.8); // 80% quality to prevent large payloads

            
            if (currentCropConfig && currentCropConfig.onCrop) {
                currentCropConfig.onCrop(base64Data, currentCropMode);
            }

            closeGlobalCropper();
        }

        function closeGlobalCropper() {
            const modal = document.getElementById('globalCropperModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            if (globalCropper) {
                globalCropper.destroy();
                globalCropper = null;
            }
            if (currentCropConfig && currentCropConfig.onCancel) {
                currentCropConfig.onCancel();
            }
        }

        // Standard Preview/Crop Handler for all pages
        function handleImageUpload(event, previewId, containerId, removeBtnId, hiddenInputId) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    openGlobalCropper(e.target.result, {
                        onCrop: (base64) => {
                            const preview = document.getElementById(previewId);
                            const container = document.getElementById(containerId);
                            const removeBtn = document.getElementById(removeBtnId);
                            const hiddenInput = document.getElementById(hiddenInputId);

                            if (preview) {
                                preview.src = base64;
                                preview.classList.remove('hidden');
                                if (currentCropMode === 'circular') {
                                    preview.classList.add('rounded-full');
                                } else {
                                    preview.classList.remove('rounded-full');
                                }
                            }
                            if (container) container.classList.add('hidden');
                            if (removeBtn) removeBtn.classList.remove('hidden');
                            if (hiddenInput) hiddenInput.value = base64;
                            
                            // Important: Disable the original file input so it doesn't upload the raw file
                            input.setAttribute('data-original-name', input.name);
                            input.removeAttribute('name');
                        },
                        onCancel: () => {
                            if (!document.getElementById(previewId).src || document.getElementById(previewId).classList.contains('hidden')) {
                                input.value = '';
                            }
                        }
                    });
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetImageUpload(inputRef, previewId, containerId, removeBtnId, hiddenInputId) {
            const input = typeof inputRef === 'string' ? document.getElementById(inputRef) : inputRef;
            const preview = document.getElementById(previewId);
            const container = document.getElementById(containerId);
            const removeBtn = document.getElementById(removeBtnId);
            const hiddenInput = document.getElementById(hiddenInputId);

            if (input) {
                if (input.hasAttribute('data-original-name')) {
                    input.name = input.getAttribute('data-original-name');
                }
                input.value = '';
            }
            if (preview) {
                preview.src = '';
                preview.classList.add('hidden');
            }
            if (container) container.classList.remove('hidden');
            if (removeBtn) removeBtn.classList.add('hidden');
            if (hiddenInput) hiddenInput.value = 'deleted';
        }
    </script>
    @stack('scripts')
</body>
</html>
