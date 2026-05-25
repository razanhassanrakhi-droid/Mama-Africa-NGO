@extends('layouts.admin')

@section('title','تعديل جهة الاتصال')

@section('content')

<main class="container mx-auto px-4 pb-10 flex-grow">

    <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 w-full max-w-6xl mx-auto">

        <h2 class="text-2xl font-bold mb-6 text-center"> {{ __('massage.contacts_management') }} </h2>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                <!-- Form Inputs -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- رقم الهاتف -->
                        <div class="col-span-2">
                            <label class="block text-sm font-semibold mb-1 text-gray-600"> {{ __('massage.phone') }}</label>
                            <input type="text" name="phone_number" 
                                value="{{ old('phone_number', $contact->phone_number) }}"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>

                        <!-- رابط فيسبوك -->
                        <div class="col-span-2">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.facebook_url') }} </label>
                            <textarea name="facebook_url" rows="4"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">{{ old('facebook_url', $contact->facebook_url) }}</textarea>
                        </div>

                        <!-- رابط تيك توك -->
                        <div class="col-span-2">
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.tiktok_url') }}  </label>
                            <textarea name="tiktok_url" rows="4"
                                class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">{{ old('tiktok_url', $contact->tiktok_url) }}</textarea>
                        </div>

                    </div>
                </div>

            </div>

            <!-- زر الحفظ -->
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-10 rounded-xl shadow-lg transition-all active:scale-95">
 {{ __('massage.update') }}                </button>
            </div>

        </form>

    </div>

</main>

@endsection

@push('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const previewContainer = document.getElementById('imagePreviewContainer');
    previewContainer.innerHTML = '';
    if(input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e){
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-full object-cover rounded-xl';
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
