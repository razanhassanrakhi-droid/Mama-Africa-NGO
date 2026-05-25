@extends('layouts.admin')

@section('title','إدارة المشاريع')

@section('content')

<section  id="contacts" class="container mx-auto px-4 pb-10 flex-grow">
  <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf  <!-- ← مهم جدًا -->

    <div class="space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-2">
                    {{ __('massage.contacts_management') }}
            </h2>
            <div class="h-1 w-16 bg-purple-600 mx-auto rounded-full"></div>
        </div>

        <div class="flex flex-col items-center justify-center gap-4 text-center p-6">
            <div class="max-w-md mx-auto p-6 bg-white rounded-2xl shadow-md border border-gray-100" dir="rtl">

                <!-- رقم الهاتف -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="md:col-span-1">
                        <label>{{ __('massage.country_code') }}</label>
                        <select id="countryCode" class="w-full p-3 border rounded">
                            <option value="254">+254</option>
                            <option value="256">+256</option>
                            <option value="20">+20</option>
                            <option value="966">+966</option>
                            <option value="971">+971</option>
                            <option value="965">+965</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label>{{ __('massage.phone') }} </label>
                        <input type="tel" id="phone_input" class="w-full p-3 border rounded" placeholder="أدخل الرقم">
                    </div>
                </div>

                <!-- الحقل المخفي الذي سيرسل الرقم مع الكود -->
                <input type="hidden" name="phone_number" id="phone_number">

                <!-- رابط الفيسبوك -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2"> {{ __('massage.facebook_url') }} </label>
                    <input name="facebook_url" type="url" placeholder="facebook.com/username"
                        class="w-full p-3 border rounded">
                </div>

                <!-- رابط تيك توك -->
                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2"> {{ __('massage.tiktok_url') }}</label>
                    <input name="tiktok_url" type="url" placeholder="tiktok.com/@username"
                        class="w-full p-3 border rounded">
                </div>

                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 mt-4 rounded w-full">
                    {{ __('massage.add_contact') }}
                </button>
            </div>
        </div>
    </div>
  </form>
  {{-- صندوق البحث --}}
<div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100 flex flex-col items-center w-full mb-10">
    <div class="flex flex-col md:flex-row items-center justify-center gap-6 w-full max-w-4xl">
        <div class="relative w-full group">
            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-sky-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input 
                onkeyup="searchData(this.value)"
                id="search" 
                type="text" 
                placeholder=" {{ __('massage.search_placeholder') }}"
                class="w-full text-xl p-6 pr-14 bg-gray-50 rounded-2xl border-2 border-transparent 
                       focus:border-sky-400 focus:bg-white focus:ring-8 focus:ring-sky-50/50 
                       outline-none transition-all text-gray-800 shadow-md placeholder:text-gray-400">
        </div>
    </div>
</div>
  {{-- جدول البيانات --}}
<div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100 w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto shadow-inner">
        <table class="w-full text-center border-collapse" id="productTable">
            
            <thead class="bg-gradient-to-l from-gray-50 to-gray-100">
                <tr class="text-indigo-900 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 font-bold">{{ __('massage.phone') }} </th>
                    <th class="py-4 px-6 font-bold"> {{ __('massage.facebook_url') }}</th>
                    <th class="py-4 px-6 font-bold"> {{ __('massage.tiktok_url') }}</th>
                   
                </tr>
            </thead>
            
            <tbody class="text-gray-700 text-sm font-light divide-y divide-gray-100">
               
@foreach($contacts as $item)
<tr class="hover:bg-indigo-50/50 transition-colors">
    
    <td class="py-4 px-6 font-medium">
        {{ $item->phone_number }}
    </td>

    <td class="py-4 px-6">
        {{ $item->facebook_url }}
    </td>

    <td class="py-4 px-6">
        <span class="py-1 px-3 rounded-full text-xs font-bold">
            {{ $item->tiktok_url }}
        </span>
    </td>

    

    <td class="py-4 px-6">
        <div class="flex items-center justify-center gap-2">
<a href="{{ route('contacts.edit', $item->id) }}" 
   class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center">
   ✎
</a>
<form action="{{ route('contacts.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all flex items-center justify-center">
        🗑
    </button>
   
</form>
        </div>
    </td>

</tr>
@endforeach

            </tbody>
        </table>
    </div>
</div>

</section>


<script>
document.querySelector('form').addEventListener('submit', function () {
    let code = document.getElementById('countryCode').value;
    let phone = document.getElementById('phone_input').value;
    document.getElementById('phone_number').value = '+' + code + phone;
});
function searchData(value) {
    const filter = value.toLowerCase();
    const rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(row => {
        // دمج كل الأعمدة النصية في الصف
        const rowText = Array.from(row.cells)
            .map(cell => cell.innerText.toLowerCase())
            .join(" ");

        // عرض أو إخفاء الصف
        if (rowText.includes(filter)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}

</script>
@endsection
