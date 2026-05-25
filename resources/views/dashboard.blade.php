<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> صفحة المدير</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Fonts: Cairo for Arabic -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        /* Custom scrollbar for table */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-lg py-4 px-6 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-12 h-12 fill-white">
            <path d="M96 96L96 544L544 544L544 96L96 96zM412.5 421.2L320 509.9L227.5 421.2L292 237.2L227.5 150.6L412.4 150.6L348 237.2L412.5 421.2z"/>
        </svg>
                <span data-i18n="title">الادارة</span>
            </h1>

       
            <nav class="navbar navbar-expand-lg fixed-top custom-navba ">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center">

      

      <!-- Desktop Nav -->
      <ul class="hidden lg:flex items-center gap-8 ml-auto text-white  border-b-2 border-transparent">
       
          <a class="nav-item relative after:block after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all after:duration-300 hover:after:w-full"
            href="#projects">Projects</a>
        </li>
        <li>
          <a class="nav-item relative after:block after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all after:duration-300 hover:after:w-full"
            href="#members">Members</a>
        </li>
        
        <li>
          <a class="nav-item relative after:block after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all after:duration-300 hover:after:w-full"
            href="#donate">Donate</a>
        </li>
        <li>
          <a class="nav-item relative after:block after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all after:duration-300 hover:after:w-full"
            href="#lastnews">News</a>
        </li>
        <li>
          <a class="nav-item relative after:block after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-orange-500 after:transition-all after:duration-300 hover:after:w-full"
            href="#contact">Contact</a>
        </li>
      <!-- Mobile Button -->
      <button class="lg:hidden ml-auto text-white text-2xl" onclick="toggleMenu()">
        ☰
      </button>
    </div>
    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden bg-black/90 text-white px-6 py-6 space-y-4">
    
      <a href="#blog" class="block">Members</a>
      <a href="#projects" class="block">Projects</a>
      <a href="#donate" class="block">Donate</a>
      <a href="#blog" class="block">News</a>
      <a href="#contact" class="block">Contact</a>

   
    </div>
  </nav>
       <div class="flex items-center">
                <button onclick="toggleLanguage()" id="langBtn"
                    class="flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white text-sm font-semibold py-1.5 px-4 rounded-full border border-white/30 transition-all shadow-sm backdrop-blur-sm">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18ZM12 3v18M3 12h18M5.625 5.625c2.5 1.5 3.375 6.375 3.375 6.375s.875 4.875 3.375 6.375M18.375 5.625c-2.5 1.5-3.375 6.375-3.375 6.375s-.875 4.875-3.375 6.375" />
</svg>
                    <span id="langText">English</span>
                </button>
            </div>

    </header>

    
  <section class="container mx-auto px-4 pb-10 flex-grow">
    <div class="space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-2" data-i18n="contact">
                ادخال وتعديل معلومات الاتصال
            </h2>
            <div class="h-1 w-16 bg-purple-600 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col items-center justify-center gap-4 text-center p-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              
              </svg>  
            <label class="  items-center gap-2 text-sm font-bold text-gray-700 mr-1" data-i18n="contactdetial">
              معلومات الاتصال 
            </label>

            <div class="max-w-md mx-auto p-6 bg-white rounded-2xl shadow-md border border-gray-100" dir="rtl">
    <label class="block text-sm font-bold text-gray-700 mb-2">رقم الهاتف</label>
    
    <div class="max-w-2xl mx-auto p-4" dir="rtl">
    <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
        
        <div class="mb-6 text-center">
            <label class="block text-2xl font-bold text-gray-800 mb-1" data-i18n="contact">بيانات التواصل</label>
            <div class="h-1 w-12 bg-indigo-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="md:col-span-1">
                <label class="block text-sm font-bold text-gray-600 mb-2">الدولة</label>
                <select id="countryCode" 
                    class="w-full p-3.5 bg-gray-50 rounded-xl border-2 border-transparent focus:border-indigo-500 outline-none transition-all cursor-pointer font-medium">
                    <option value="254">  +254</option>
                    <option value="256"> +256</option>
                    <option value="20">+20</option>
            <option value="966">+966</option>
            <option value="971">+971</option>
            <option value="965"> +965</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-600 mb-2">رقم الهاتف</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <input type="tel" id="phone" placeholder="أدخل رقم الهاتف"
                        class="w-full p-3.5 pr-10 bg-gray-50 rounded-xl border-2 border-transparent focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100 outline-none transition-all text-gray-800 shadow-sm">
                </div>
                    
</div>
            </div>
             <div class="max-w-md mx-auto p-4" dir="rtl w-full">
    <label class="block text-sm font-bold text-gray-700 mb-2 mr-1">رابط حساب الفيسبوك</label>
    
    <div class="relative group">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-5 w-5 fill-current text-[#1877F2] group-focus-within:scale-110 transition-transform duration-200" 
                viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
        </div>

        <input type="url" id="facebookLink" placeholder="facebook.com/username"
            class="w-full p-3.5 pr-11 bg-white rounded-xl border-2 border-gray-100 shadow-sm outline-none transition-all
                   focus:border-[#1877F2] focus:ring-4 focus:ring-blue-50 text-gray-800 text-left dir-ltr placeholder:text-gray-300 placeholder:text-right">
    </div>
   <div class="flex justify-center w-full">
    <p class="mt-2 text-[11px] text-gray-400 flex items-center gap-1 text-center w-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>تأكد من كتابة الرابط بشكل صحيح ليبدأ بـ https</span>
    </p>
</div>
<div class="max-w-md mx-auto p-4" dir="rtl">
    <label class="block text-sm font-bold text-gray-700 mb-2 text-center">رابط حساب تيك توك</label>
    
    <div class="relative group">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black group-focus-within:text-[#ff0050] transition-colors" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.03 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.9-.32-1.98-.23-2.81.33-.76.51-1.28 1.43-1.24 2.36.01.75.53 1.58 1.25 1.86.33.14.71.18 1.08.18 1.2-.12 2.21-.97 2.59-2.09.12-.53.13-1.08.12-1.63-.01-5.17-.01-10.34-.01-15.51z"/>
            </svg>
        </div>

        <input type="url" id="tiktokLink" placeholder="tiktok.com/@username"
            class="w-full p-3.5 pr-11 bg-white rounded-xl border-2 border-gray-100 shadow-sm outline-none transition-all
                   focus:border-black focus:ring-4 focus:ring-gray-100 text-gray-800 text-left ltr placeholder:text-right">
    </div>
    
    <div class="flex justify-center w-full">
        <p class="mt-3 text-[11px] text-gray-400 flex items-center gap-1 text-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>تأكد من كتابة الرابط بشكل صحيح ليبدأ بـ https</span>
        </p>
    </div>
    <button onclick="addTikTok()" 
            class="w-full bg-black hover:bg-[#25F4EE] hover:text-black text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-90 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>إضافة معلومات الاتصال</span>
        </button>
</div>
        </div>
        

       
    </div>
</div>
    
    
        </div>
    </div>
</section>
<section class="container mx-auto px-4 pb-10 flex-grow">
   <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            <!-- Form Inputs (Right Side - 3 Columns) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold mb-1 text-gray-600 text-center" data-i18n="help">تاثير المساعدات</label>
                         <label class="block text-sm font-semibold mb-1 text-gray-600 " data-i18n="helpname">اسم الشخص</label>
                        <input type="text" id="title" placeholder="أدخل اسم الشخص" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    <div class="col-span-2">
                  
                         <label class="block text-sm font-semibold mb-1 text-gray-600 " data-i18n="impact"> التعليق</label>
                        <input type="text" id="title" placeholder="أدخل  تعليقات" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    
                    

                    
                   
                </div>

                
            </div>

            <!-- Image Placeholder2  (Left Side - 1 Column) -->
            <div class="lg:col-span-1">
                <div class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer group relative overflow-hidden">
                    <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10" id="imageInput" onchange="previewImage1(event)">
                    <div id="imagePreviewContainer1" class="w-full h-full flex flex-col items-center justify-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600" data-i18n="uploadText1">اضغط لرفع صورة المساعدات</span>
                    </div>
                    <img id="imagePreview1" class="absolute inset-0 w-full h-full object-cover hidden" />
                    <button id="removeImageBtn1" onclick="removeImage1(event)" class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 hidden z-20" title="حذف الصورة">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="  flex justify-center w-full">
            <button id="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span data-i18n="create">إنشاء التعليق</span>
            </button>
            
        
     
        </div>

        <!-- Search Input -->
       
    
   <div class="flex flex-col items-center justify-center gap-6 p-6 max-w-2xl mx-auto">

    <div class="relative w-full">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <input onkeyup="searchData(this.value)" id="search" type="text" 
               placeholder="بحث بالاسم..." 
               class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm 
                      focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500 
                      transition-all bg-white text-gray-800 text-center">
    </div>

</div>
<div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr id="tableHeadRow" class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">اسم الشخص</th>
                    <th class="py-4 px-6 font-bold">التعليق</th>
                    <th class="py-4 px-6 font-bold">الصورة</th>
                    <th class="py-4 px-6 font-bold">العمليات</th>
                
                </tr>
            </thead>
            
            <tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
                <tr class="hover:bg-indigo-50/50 transition-colors">
                    <td class="py-4 px-6 text-center font-medium">اسم الشخص  </td>
                    <td class="py-4 px-6 text-center">التعليق</td>
                    
                    
<td class="py-4 px-6 text-center">
    <div class="flex justify-center items-center">
        <img 
            src="images/2.jpg" 
            alt="وصف الصورة" 
            class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 shadow-sm"
        >
    </div>
</td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex item-center justify-center gap-2">
                            <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">✎</button>
                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all">🗑</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="noDataMessage" class="p-16 text-center hidden" data-i18n="noData">
        <div class="flex flex-col items-center justify-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <span class="text-gray-500 font-bold text-xl">قائمة البيانات فارغة تماماً</span>
            <p class="text-gray-400 max-w-xs">ابدأ بإضافة أول مشروع أو منتج ليظهر هنا في الجدول.</p>
        </div>
    </div>
</div>
        <!-- Delete All Button Container -->
    

        <!-- Data Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-right" id="productTable">
                    <thead class="bg-gray-100 text-gray-700 border-b border-gray-200">
                        <tr id="tableHeadRow">
                           <!-- Injected by JS -->
                        </tr>
                    </thead>
                    <tbody id="tbody" class="divide-y divide-gray-100">
                        <!-- Data rows injected by JS -->
                    </tbody>
                </table>
            </div>
            <div id="noDataMessage" class="p-8 text-center text-gray-500 hidden" data-i18n="noData">
                لا توجد منتجات حاليا. أضف منتج جديد.
            </div>
        </div></section>
<!--members-->
        
<section class="container mx-auto px-4 pb-10 flex-grow">
    <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Form Inputs (Right Side - 3 Columns) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">
                    <div class="col-span-2">
                        <label class="block text-2xl font-font-bold mb-1 text-black text-center " data-i18n="members">
                          إدارة الأعضاء</label>
                        <label class="block text-sm font-semibold mb-1 text-gray-600" data-i18n="membername">
                            اسم ال</label>
                        <input type="text" id="titlemember" placeholder="أدخل اسم العضو"
                            class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                    <div class="col-span-2">
                       
                        <label class="block text-sm font-semibold mb-1 text-gray-600" data-i18n="jobname">
                            اسم الوظيفة</label>
                        <input type="text" id="job" placeholder="أدخل اسم الوظيفة"
                            class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>


                    <div
                        class="grid grid-cols-2 md:grid-cols-4 gap-2 col-span-2 bg-gray-50 p-3 rounded-lg border border-gray-200 flex justify-center ">
    
                    

                    <div class="lg:col-span-3 space-y-4 ">
                       <div class="flex flex-col items-center justify-center w-full max-w-xs mx-auto  ">
                        <label class="block text-sm font-semibold mb-1 text-gray-600" data-i18n="des"> دور العضو</label>
                         <input type="text" id="title" placeholder="وصف الدور"
                            class="w-full h-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                </div>
                </div>
            </div> </div>

            <!-- Image Placeholder3 (Left Side - 1 Column) -->
            <div class="lg:col-span-1">
                <div
                    class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer group relative overflow-hidden">
                    <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        id="imageInput" onchange="previewImage2(event)">
                    <div id="imagePreviewContainer2" class="w-full h-full flex flex-col items-center justify-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600"
                            data-i18n="uploadText2">اضغط لرفع صورة  الاعضاء</span>
                    </div>
                    <img id="imagePreview2" class="absolute inset-0 w-full h-full object-cover hidden" />
                    <button id="removeImageBtn2" onclick="removeImage2(event)"
                        class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 hidden z-20"
                        title="حذف الصورة">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
      

        <!-- Action Buttons -->
       


</div>
    <div class="relative w-full">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
          <div class="max-w-5xl mx-auto p-4" dir="rtl">
 <div class="  flex justify-center w-full">
            <button id="submitMamber" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span data-i18n="createmember">اضافه </span>
            </button>
            
    
     
        </div>



    
  
</div>

        <input onkeyup="searchData(this.value)" id="search" type="text" 
               placeholder="بحث بالاسم..." 
               class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm 
                      focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500 
                      transition-all bg-white text-gray-800 text-center">
                      
  <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr id="tableHeadRow" class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">اسم العضو</th>
                    <th class="py-4 px-6 font-bold">الوظيفة</th>
                    <th class="py-4 px-6 font-bold">دور</th>
                    <th class="py-4 px-6 font-bold">الصورة</th>
                      <th class="py-4 px-6 font-bold">العمليات</th>
                </tr>
            </thead>
            
            <tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
                <tr class="hover:bg-indigo-50/50 transition-colors">
                    <td class="py-4 px-6 text-center font-medium">اسم العضو </td>
                    <td class="py-4 px-6 text-center">الوظيفة</td>
                    <td class="py-4 px-6 text-center">
                        <span class=" py-1 px-3 rounded-full text-xs font-bold">دور</span>
                    </td>
                    
<td class="py-4 px-6 text-center">
                         <div class="flex justify-center items-center">
        <img 
            src="رابط_الصورة_هنا.jpg" 
            alt="وصف الصورة" 
            class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 shadow-sm"
        >
    </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex item-center justify-center gap-2">
                            <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">✎</button>
                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all">🗑</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="noDataMessage" class="p-16 text-center hidden" data-i18n="noData">
        <div class="flex flex-col items-center justify-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <span class="text-gray-500 font-bold text-xl">قائمة البيانات فارغة تماماً</span>
            <p class="text-gray-400 max-w-xs">ابدأ بإضافة أول مشروع أو منتج ليظهر هنا في الجدول.</p>
        </div>
    </div>


</section>
<section class="container mx-auto px-4 pb-10 flex-grow">
  <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Form Inputs (Right Side - 3 Columns) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">
                    <div class="col-span-2">
                        <label class="block text-2xl font-font-bold mb-1 text-black text-center " data-i18n="members">
                    إدارة التبرعات</label>
                       <div class="p-6 bg-gray-100 min-h-screen font-sans" dir="rtl">
    
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-8 border-r-4 border-blue-600">
        <h2 class="text-xl font-bold mb-4 text-gray-800">إعدادات حساب استقبال التبرعات</h2>
        <div class="flex flex-wrap gap-4 items-end">
            <div class="flex-1">
                <label class="block text-sm text-gray-600 mb-1">رقم IBAN المنظمة</label>
                <input type="text" placeholder="SA..." class="w-full p-2 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">حفظ التغييرات</button>
        </div>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-sm">
        <h2 class="text-xl font-bold mb-6 text-gray-800 border-b pb-2">متابعة مشاريع منظمة أفريكان</h2>
        
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm uppercase">
                        <th class="py-3 px-4 border-b">اسم المشروع</th>
                        <th class="py-3 px-4 border-b">اسم الشخص</th>
                        <th class="py-3 px-4 border-b">المبلغ </th>
                       
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-4 border-b font-medium">حفر بئر مياه - كينيا</td>
                       <td class="py-4 px-4 border-b">اسم الشخص</td>
                        <td class="py-4 px-4 border-b">15,000 ريال</td>
                        
                        
    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                    </div>


</section>

    <section class="container mx-auto px-4 pb-10 flex-grow">
    <div class="glass-effect rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Form Inputs 3(Right Side - 3 Columns) -->
            <div class="lg:col-span-3 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex justify-center">
                    <div class="col-span-2">
                        <label class="block text-2xl font-font-bold mb-1 text-black text-center " data-i18n="projectM">
                          إدارة المشاريع</label>
                        <label class="block text-sm font-semibold mb-1 text-gray-600" data-i18n="membername">
                     تصنيف المشروع</label>
                        <input type="text" id="titlemember" placeholder="    ادخل تصنيف المشروع "
                            class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    </div>
                   


                   
            </div> </div>

            <!-- Image Placeholder (Left Side - 1 Column) -->
            <div class="lg:col-span-1">
                <div
                    class="h-full min-h-[200px] border-2 border-dashed border-gray-300 rounded-xl flex flex-col justify-center items-center bg-gray-50 hover:bg-gray-100 transition cursor-pointer group relative overflow-hidden">
                    <input type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                        id="imageInput" onchange="previewImage3(event)">
                    <div id="imagePreviewContainer3" class="w-full h-full flex flex-col items-center justify-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-16 w-16 text-gray-400 group-hover:text-blue-500 transition mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-500 font-medium group-hover:text-blue-600"
                            data-i18n="uploadText1">اضغط لرفع صورة  التصنيف</span>
                    </div>
                    <img id="imagePreview3" class="absolute inset-0 w-full h-full object-cover hidden" />
                    <button id="removeImageBtn3" onclick="removeImage3(event)"
                        class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 hidden z-20"
                        title="حذف الصورة">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
      

        <!-- Action Buttons -->
       


</div>
    <div class="relative w-full">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
          <div class="max-w-5xl mx-auto p-4" dir="rtl">
 <div class="  flex justify-center w-full">
            <button id="submitMamber" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span data-i18n="createmember">اضافه </span>
            </button>
            
    
     
        </div>



    
  
</div>

        <input onkeyup="searchData(this.value)" id="search" type="text" 
               placeholder="بحث بالاسم..." 
               class="w-full p-4 pr-10 rounded-xl border border-gray-200 shadow-sm 
                      focus:outline-none focus:ring-4 focus:ring-sky-500/20 focus:border-sky-500 
                      transition-all bg-white text-gray-800 text-center">
                      
  <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr id="tableHeadRow" class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">تصنيف المشروع</th>
                    <th class="py-4 px-6 font-bold">الصورة</th>
                      <th class="py-4 px-6 font-bold">العمليات</th>
                </tr>
            </thead>
            
            <tbody id="tbody" class="text-gray-700 text-sm font-light divide-y divide-gray-100">
                <tr class="hover:bg-indigo-50/50 transition-colors">
                    <td class="py-4 px-6 text-center font-medium"> تصنيف </td>
                
                  
                    
<td class="py-4 px-6 text-center">
                         <div class="flex justify-center items-center">
        <img 
            src="رابط_الصورة_هنا.jpg" 
            alt="وصف الصورة" 
            class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 shadow-sm"
        >
    </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex item-center justify-center gap-2">
                            <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">✎</button>
                            <button class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all">🗑</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="noDataMessage" class="p-16 text-center hidden" data-i18n="noData">
        <div class="flex flex-col items-center justify-center gap-4">
            <div class="bg-gray-100 p-6 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
            </div>
            <span class="text-gray-500 font-bold text-xl">قائمة البيانات فارغة تماماً</span>
            <p class="text-gray-400 max-w-xs">ابدأ بإضافة أول مشروع أو منتج ليظهر هنا في الجدول.</p>
        </div>
    </div>


</section>






    <script>
        // DOM Elements
        let title = document.getElementById('title');
        let price = document.getElementById('price');
        let taxes = document.getElementById('taxes');
        let ads = document.getElementById('ads');
        let discount = document.getElementById('discount');
        let total = document.getElementById('total');
        let count = document.getElementById('count');
        let category = document.getElementById('category');
        let submit = document.getElementById('submit');
        let search = document.getElementById('search');
        let imageInput = document.getElementById('imageInput');
        let imagePreview = document.getElementById('imagePreview');
        let imagePreviewContainer = document.getElementById('imagePreviewContainer');
        let removeImageBtn = document.getElementById('removeImageBtn');

        let mood = 'create';
        let tmp;
        let searchMood = 'title';
        let currentImageBase64 = '';
        let currLang = 'ar'; // Default language

        // Translations Dictionary
        const translations = {
            ar: {
                langBtn: "عربي",
                title: "الادارة",
                news:"الاخبار",
                productName: "اسم المنتج",
                productNamePlaceholder: "أدخل اسم المنتج",
                price: "السعر",
                taxes: "الضرائب",
                ads: "الاعلانات",
                discount: "الخصم",
                category: "التصنيف",
                count: "كمية المخزون",
                total: "إجمالي السعر:",
                uploadText: "اضغط لرفع صورة المنتج",
                create: "إنشاء منتج",
                update: "تحديث",
                searchTitle: "بحث بالاسم",
                searchCategory: "بحث بالتصنيف",
                clear: "تفريغ الحقول",
                searchPlaceholder: "بحث...",
                searchPlaceholderTitle: "بحث عن طريق الاسم",
                searchPlaceholderCategory: "بحث عن طريق التصنيف",
                tableHeader: ["م", "الصورة", "الاسم", "السعر", "الضرائب", "الاعلانات", "الخصم", "الاجمالي", "الكمية", "حالة المخزون", "التصنيف", "اجراءات"],
                noData: "لا توجد منتجات حاليا. أضف منتج جديد.",
                deleteAll: "حذف الكل",
                available: "متوفر",
                limited: "كمية محدودة",
                outOfStock: "نفذت الكمية",
                confirmDelete: "هل أنت متأكد من حذف هذا المنتج؟",
                confirmDeleteAll: "هل أنت متأكد من حذف جميع البيانات؟",
                validation: "الرجاء ملء الحقول الأساسية: الاسم، السعر، والتصنيف",
                selectCategory: "اختر التصنيف",
                cat_electronics: "الالكترونيات",
                cat_fashion: "الأزياء",
                cat_home: "المنزل",
                cat_mobiles: "الهواتف",
                cat_computers: "أجهزة الكمبيوتر",
                cat_accessories: "اكسسوارات",
                back: "رجوع"
            },
            en: {
                back: "back",
                news:"news",
                langBtn: "English",
                title: " Management",
                version: "Inventory System v1.0",
                productName: "Product Name",
                productNamePlaceholder: "Enter Product Name",
                price: "Price",
                taxes: "Taxes",
                ads: "Ads",
                discount: "Discount",
                category: "Category",
                count: "Stock Quantity",
                total: "Total Price:",
                uploadText: "Click to upload image",
                create: "Create Product",
                update: "Update",
                searchTitle: "Search By Name",
                searchCategory: "Search By Category",
                clear: "Clear Fields",
                searchPlaceholder: "Search...",
                searchPlaceholderTitle: "Search by Name",
                searchPlaceholderCategory: "Search by Category",
                tableHeader: ["ID", "Image", "Name", "Price", "Taxes", "Ads", "Discount", "Total", "Qty", "Stock Status", "Category", "Actions"],
                noData: "No products found. Add a new product.",
                deleteAll: "Delete All",
                available: "Available",
                limited: "Limited",
                outOfStock: "Out of Stock",
                confirmDelete: "Are you sure you want to delete this product?",
                confirmDeleteAll: "Are you sure you want to delete all data?",
                validation: "Please fill required fields: Name, Price, and Category",
                selectCategory: "Select Category",
                cat_electronics: "Electronics",
                cat_fashion: "Fashion",
                cat_home: "Home",
                cat_mobiles: "Mobiles",
                cat_computers: "Computers",
                cat_accessories: "Accessories"
            }
        };

        // 0. Language Handling
      
        function back() {
            window.location.href = "pr4.html"
        }
function toggleMenu() {
        document.getElementById("mobileMenu").classList.toggle("hidden");
      }
        function updateTexts() {
            const t = translations[currLang];

            // Update Direction
            document.documentElement.lang = currLang;
            document.documentElement.dir = currLang === 'ar' ? 'rtl' : 'ltr';

            // Update Table alignment
            const table = document.getElementById('productTable');
            if (currLang === 'ar') {
                table.classList.remove('text-left');
                table.classList.add('text-right');
            } else {
                table.classList.remove('text-right');
                table.classList.add('text-left');
            }

            // Update DOM Elements with data-i18n
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (t[key]) {
                    el.innerText = t[key];
                }
            });

            // Update Placeholders
            title.placeholder = t.productNamePlaceholder;

            // Update Toggle Button Text
            document.getElementById('langBtnText').innerText = t.langBtn;

            // Update Submit Button Text (if not updating)
            if (mood === 'create') {
                const icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>`;
                submit.innerHTML = `${icon} <span>${t.create}</span>`;
            } else {
                const icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>`;
                submit.innerHTML = `${icon} <span>${t.update}</span>`;
            }

            // Update Search Placeholder
            if (searchMood === 'title') {
                search.placeholder = t.searchPlaceholderTitle;
            } else {
                search.placeholder = t.searchPlaceholderCategory;
            }
        }

        // 1. Calculate Total
        function getTotal() {
            if (price.value != '') {
                let result = (+price.value + +taxes.value + +ads.value) - +discount.value;
                total.innerHTML = result;
                if (result < 0) {
                    total.style.background = '#ef4444';
                } else {
                    total.style.background = '#10b981';
                }
            } else {
                total.innerHTML = '0';
                total.style.background = '#ef4444';
            }
        }
        function previewImage2(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview2');
    const container = document.getElementById('imagePreviewContainer2');
    const removeBtn = document.getElementById('removeImageBtn2');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            // وضع رابط الصورة في عنصر المعاينة
            preview.src = e.target.result;
            // إظهار الصورة وزر الحذف
            preview.classList.remove('hidden');
            removeBtn.classList.remove('hidden');
            // إخفاء حاوية النص والأيقونة الافتراضية
            container.classList.add('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
}


// 2. دالة حذف الصورة المرفوعة
function removeImage2(event) {
    // منع تداخل الأحداث (حتى لا يفتح اختيار الملف عند الضغط على حذف)
    event.preventDefault();
    event.stopPropagation();

    const input = document.getElementById('imageInput'); // الـ id كما ورد في كودك
    const preview = document.getElementById('imagePreview2');
    const container = document.getElementById('imagePreviewContainer2');
    const removeBtn = document.getElementById('removeImageBtn2');

    // تفريغ قيمة الحقل (Input)
    input.value = "";
    
    // مسح مصدر الصورة وإخفاؤها
    preview.src = "";
    preview.classList.add('hidden');
    
    // إخفاء زر الحذف
    removeBtn.classList.add('hidden');
    
    // إعادة إظهار أيقونة الرفع والنص
    container.classList.remove('hidden');
}
        function previewImage3(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview3');
    const container = document.getElementById('imagePreviewContainer3');
    const removeBtn = document.getElementById('removeImageBtn3');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            container.classList.add('hidden');
            removeBtn.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function removeImage3(event) {
    // منع السلوك الافتراضي ومنع انتشار الحدث (ضروري جداً)
    event.preventDefault();
    event.stopPropagation(); 

    // تأكد أن الـ ID في الـ HTML هو imageInput3
    const input3 = document.getElementById('imageInput3'); 
    const preview3 = document.getElementById('imagePreview3');
    const container3 = document.getElementById('imagePreviewContainer3');
    const removeBtn3 = document.getElementById('removeImageBtn3');

    // 1. تصفير قيمة مدخل الملفات
    if (input3) {
        input3.value = ""; 
    }
    
    // 2. مسح وإخفاء الصورة
    if (preview3) {
        preview3.src = "";
        preview3.classList.add('hidden');
    }
    
    // 3. إعادة إظهار حاوية الرفع الأصلية
    if (container3) {
        container3.classList.remove('hidden');
    }

    // 4. إخفاء زر الحذف
    if (removeBtn3) {
        removeBtn3.classList.add('hidden');
    }
}


function removeImage(event) {
    event.preventDefault();
    const input1 = document.getElementById('imageInput3'); // هنا الاسم input1
    const preview1 = document.getElementById('imagePreview3');
    const container1 = document.getElementById('imagePreviewContainer3');
    const removeBtn1 = document.getElementById('removeImageBtn3');

    // التعديل: تأكد من إضافة الرقم '1' لاسم المتغير
    if (input1) input1.value = ""; 
    
    if (preview1) {
        preview1.src = "";
        preview1.classList.add('hidden');
    }
    
    if (container1) container1.classList.remove('hidden');
    if (removeBtn1) removeBtn1.classList.add('hidden');
}
        // 2. Image Handling
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    currentImageBase64 = e.target.result;
                    imagePreview1.src = currentImageBase64;
                    imagePreview1.classList.remove('hidden');
                    removeImageBtn1.classList.remove('hidden');
                    imagePreviewContainer1.classList.add('opacity-0');
                }
                reader.readAsDataURL(file);
            }
        }
        // 1. دالة عرض الصورة عند اختيارها
function previewImage2(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview2');
    const container = document.getElementById('imagePreviewContainer2');
    const removeBtn = document.getElementById('removeImageBtn2');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            // وضع رابط الصورة في عنصر المعاينة
            preview.src = e.target.result;
            // إظهار الصورة وزر الحذف
            preview.classList.remove('hidden');
            removeBtn.classList.remove('hidden');
            // إخفاء حاوية النص والأيقونة الافتراضية
            container.classList.add('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
}


// 2. دالة حذف الصورة المرفوعة
function removeImage2(event) {
    // منع تداخل الأحداث (حتى لا يفتح اختيار الملف عند الضغط على حذف)
    event.preventDefault();
    event.stopPropagation();

    const input = document.getElementById('imageInput'); // الـ id كما ورد في كودك
    const preview = document.getElementById('imagePreview2');
    const container = document.getElementById('imagePreviewContainer2');
    const removeBtn = document.getElementById('removeImageBtn2');

    // تفريغ قيمة الحقل (Input)
    input.value = "";
    
    // مسح مصدر الصورة وإخفاؤها
    preview.src = "";
    preview.classList.add('hidden');
    
    // إخفاء زر الحذف
    removeBtn.classList.add('hidden');
    
    // إعادة إظهار أيقونة الرفع والنص
    container.classList.remove('hidden');
}
        function previewImage1(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview1');
    const container = document.getElementById('imagePreviewContainer1');
    const removeBtn = document.getElementById('removeImageBtn1');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            container.classList.add('hidden');
            removeBtn.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}



function removeImage1(event) {
    event.preventDefault();
    const input1 = document.getElementById('imageInput1'); // هنا الاسم input1
    const preview1 = document.getElementById('imagePreview1');
    const container1 = document.getElementById('imagePreviewContainer1');
    const removeBtn1 = document.getElementById('removeImageBtn1');

    // التعديل: تأكد من إضافة الرقم '1' لاسم المتغير
    if (input1) input1.value = ""; 
    
    if (preview1) {
        preview1.src = "";
        preview1.classList.add('hidden');
    }
    
    if (container1) container1.classList.remove('hidden');
    if (removeBtn1) removeBtn1.classList.add('hidden');
}
        // 2. Image Handling
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    currentImageBase64 = e.target.result;
                    imagePreview1.src = currentImageBase64;
                    imagePreview1.classList.remove('hidden');
                    removeImageBtn1.classList.remove('hidden');
                    imagePreviewContainer1.classList.add('opacity-0');
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage(e) {
            if (e) e.stopPropagation();
            currentImageBase64 = '';
            imageInput.value = '';
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
            removeImageBtn.classList.add('hidden');
            imagePreviewContainer.classList.remove('opacity-0');
        }
        

        // 3. Create Product
        let dataPro;
        if (localStorage.product != null) {
            dataPro = JSON.parse(localStorage.product);
        } else {
            dataPro = [];
        }

        submit.onclick = function () {
            const t = translations[currLang];
            // Validation
            if (title.value.trim() === '' || price.value.trim() === '' || category.value.trim() === '') {
                alert(t.validation);
                return;
            }


            let newPro = {
                title: title.value.toLowerCase(),
                price: price.value,
                taxes: taxes.value || 0,
                ads: ads.value || 0,
                discount: discount.value || 0,
                total: total.innerHTML,
                count: count.value,
                category: category.value.toLowerCase(),
                image: currentImageBase64
            }

            if (mood === 'create') {
                dataPro.push(newPro);
            } else {
                dataPro[tmp] = newPro;
                mood = 'create';
                submit.className = "bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2";
                // InnerHTML updated in updateTexts/showData or manually here:
                const icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>`;
                submit.innerHTML = `${icon} <span>${t.create}</span>`;
            }

            localStorage.setItem('product', JSON.stringify(dataPro));
            clearDataInputs();
            showData();
        }

        // 4. Clear Inputs
        function clearDataInputs() {
            title.value = '';
            price.value = '';
            taxes.value = '';
            ads.value = '';
            discount.value = '';
            total.innerHTML = '0';
            count.value = '';
            category.value = '';
            removeImage();
            getTotal();
        }

        // 5. Read / Show Data
        function showData() {
            getTotal();
            const t = translations[currLang];

            // Update Table Header
            let headHtml = '';
            t.tableHeader.forEach(h => {
                headHtml += `<th class="p-4 font-bold text-center">${h}</th>`;
            });
            document.getElementById('tableHeadRow').innerHTML = headHtml;

            let table = '';
            for (let i = 0; i < dataPro.length; i++) {
                let imgHtml = dataPro[i].image ?
                    `<img src="${dataPro[i].image}" class="w-12 h-12 rounded object-cover border border-gray-200 shadow-sm mx-auto">` :
                    `<div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center mx-auto text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>`;

                let stockStatus = '';
                if (dataPro[i].count > 10) {
                    stockStatus = `<span class="bg-green-100 text-green-700 py-1 px-2 rounded text-xs font-bold border border-green-200">${t.available} (${dataPro[i].count})</span>`;
                } else if (dataPro[i].count > 0) {
                    stockStatus = `<span class="bg-orange-100 text-orange-700 py-1 px-2 rounded text-xs font-bold border border-orange-200">${t.limited} (${dataPro[i].count})</span>`;
                } else {
                    stockStatus = `<span class="bg-red-100 text-red-700 py-1 px-2 rounded text-xs font-bold border border-red-200">${t.outOfStock}</span>`;
                }

                // Translate category if possible
                let displayCat = dataPro[i].category;
                if (t.catOptions && t.catOptions[displayCat]) {
                    displayCat = t.catOptions[displayCat];
                } else {
                    // Fallback to translate via key matching (e.g. if category is stored as 'electronics')
                    let catKey = 'cat_' + displayCat;
                    if (t[catKey]) displayCat = t[catKey];
                }

                table += `
                <tr class="hover:bg-blue-50 transition border-b border-gray-100 last:border-none">
                    <td class="p-4 text-gray-500 font-mono text-sm text-center">#${i + 1}</td>
                    <td class="p-4 text-center">${imgHtml}</td>
                    <td class="p-4 font-semibold text-gray-800 text-center">${dataPro[i].title}</td>
                    <td class="p-4 text-gray-600 text-center">${dataPro[i].price}</td>
                    <td class="p-4 text-gray-500 text-center">${dataPro[i].taxes}</td>
                    <td class="p-4 text-gray-500 text-center">${dataPro[i].ads}</td>
                    <td class="p-4 text-red-500 font-medium text-center">${dataPro[i].discount}</td>
                    <td class="p-4 text-green-600 font-bold text-lg text-center">${dataPro[i].total}</td>
                    <td class="p-4 font-mono text-gray-700 text-center">${dataPro[i].count || 0}</td>
                    <td class="p-4 text-center">${stockStatus}</td>
                    <td class="p-4 text-center"><span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold">${displayCat}</span></td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="updateData(${i})" class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-lg shadow transition cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                            <button onclick="deleteData(${i})" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow transition cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                `;
            }

            document.getElementById('tbody').innerHTML = table;

            // Delete All Button
            let btnDelete = document.getElementById('deleteAll');
            if (dataPro.length > 0) {
                btnDelete.innerHTML = `
                <button onclick="deleteAll()" class="w-full bg-red-100 hover:bg-red-200 text-red-600 font-bold py-2 px-4 rounded-lg border border-red-200 transition flex items-center justify-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>${t.deleteAll} (${dataPro.length})</span>
                </button>
                `;
                document.getElementById('noDataMessage').classList.add('hidden');
            } else {
                btnDelete.innerHTML = '';
                document.getElementById('noDataMessage').classList.remove('hidden');
            }
        }

        // 6. Delete Data
        function deleteData(i) {
            const t = translations[currLang];
            if (confirm(t.confirmDelete)) {
                dataPro.splice(i, 1);
                localStorage.product = JSON.stringify(dataPro);
                showData();
            }
        }

        function deleteAll() {
            const t = translations[currLang];
            if (confirm(t.confirmDeleteAll)) {
                localStorage.clear();
                dataPro.splice(0);
                showData();
            }
        }

        // 7. Update Data
        function updateData(i) {
            const t = translations[currLang];
            title.value = dataPro[i].title;
            price.value = dataPro[i].price;
            taxes.value = dataPro[i].taxes;
            ads.value = dataPro[i].ads;
            discount.value = dataPro[i].discount;
            category.value = dataPro[i].category;
            currentImageBase64 = dataPro[i].image;

            if (currentImageBase64) {
                imagePreview.src = currentImageBase64;
                imagePreview.classList.remove('hidden');
                removeImageBtn.classList.remove('hidden');
                imagePreviewContainer.classList.add('opacity-0');
            } else {
                removeImage();
            }

            getTotal();
            count.style.display = 'none'; // Hide count field in update mode? Keeping original logic

            const icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>`;
            submit.innerHTML = `${icon} <span>${t.update}</span>`;
            submit.className = "bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2";

            mood = 'update';
            tmp = i;

            scroll({
                top: 0,
                behavior: 'smooth'
            });
        }

        // 8. Search
        function getSearchMood(id) {
            const t = translations[currLang];
            if (id == 'searchTitle') {
                searchMood = 'title';
            } else {
                searchMood = 'category';
            }
            search.placeholder = searchMood == 'title' ? t.searchPlaceholderTitle : t.searchPlaceholderCategory;
            search.focus();
            search.value = '';
            showData();
        }

        function searchData(value) {
            const t = translations[currLang];
            let table = '';
            for (let i = 0; i < dataPro.length; i++) {
                if (searchMood == 'title') {
                    if (dataPro[i].title.includes(value.toLowerCase())) {
                        renderRow(i, t, table);
                    }
                } else {
                    if (dataPro[i].category.includes(value.toLowerCase())) {
                        renderRow(i, t, table);
                    }
                }
            }
            // Helper to render row to avoid duplication (simulated)
            // But since I can't extract function easily in string, I'll just copy the logic or rely on showData filtering?
            // showData is "show all". searchData filters.
            // I'll re-implement the loop with the rendering logic inside here.

            // To make code cleaner, I'll just paste the render logic here again.
            let innerTable = '';
            for (let i = 0; i < dataPro.length; i++) {
                let match = false;
                if (searchMood == 'title') {
                    if (dataPro[i].title.includes(value.toLowerCase())) match = true;
                } else {
                    if (dataPro[i].category.includes(value.toLowerCase())) match = true;
                }

                if (match) {
                    let imgHtml = dataPro[i].image ?
                        `<img src="${dataPro[i].image}" class="w-12 h-12 rounded object-cover border border-gray-200 shadow-sm mx-auto">` :
                        `<div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center mx-auto text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>`;

                    let stockStatus = '';
                    if (dataPro[i].count > 10) {
                        stockStatus = `<span class="bg-green-100 text-green-700 py-1 px-2 rounded text-xs font-bold border border-green-200">${t.available} (${dataPro[i].count})</span>`;
                    } else if (dataPro[i].count > 0) {
                        stockStatus = `<span class="bg-orange-100 text-orange-700 py-1 px-2 rounded text-xs font-bold border border-orange-200">${t.limited} (${dataPro[i].count})</span>`;
                    } else {
                        stockStatus = `<span class="bg-red-100 text-red-700 py-1 px-2 rounded text-xs font-bold border border-red-200">${t.outOfStock}</span>`;
                    }

                    let displayCat = dataPro[i].category;
                    if (t.catOptions && t.catOptions[displayCat]) {
                        displayCat = t.catOptions[displayCat];
                    } else {
                        let catKey = 'cat_' + displayCat;
                        if (t[catKey]) displayCat = t[catKey];
                    }

                    innerTable += `
                    <tr class="hover:bg-blue-50 transition border-b border-gray-100 last:border-none">
                        <td class="p-4 text-gray-500 font-mono text-sm text-center">#${i + 1}</td>
                        <td class="p-4 text-center">${imgHtml}</td>
                        <td class="p-4 font-semibold text-gray-800 text-center">${dataPro[i].title}</td>
                        <td class="p-4 text-gray-600 text-center">${dataPro[i].price}</td>
                        <td class="p-4 text-gray-500 text-center">${dataPro[i].taxes}</td>
                        <td class="p-4 text-gray-500 text-center">${dataPro[i].ads}</td>
                        <td class="p-4 text-red-500 font-medium text-center">${dataPro[i].discount}</td>
                        <td class="p-4 text-green-600 font-bold text-lg text-center">${dataPro[i].total}</td>
                        <td class="p-4 font-mono text-gray-700 text-center">${dataPro[i].count || 0}</td>
                        <td class="p-4 text-center">${stockStatus}</td>
                        <td class="p-4 text-center"><span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold">${displayCat}</span></td>
                        <td class="p-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="updateData(${i})" class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-lg shadow transition cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                                <button onclick="deleteData(${i})" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg shadow transition cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    `;
                }
            }
            document.getElementById('tbody').innerHTML = innerTable;
        }

        // Initialize
        updateTexts();
        showData();
    </script>
</body>

</html>