@extends('admin.layouts.app')

@section('title', __('massage.form_edit_member') ?? 'Edit Team Member')
@section('header', __('massage.form_edit_member') ?? 'Edit Team Member')

@section('content')
<div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 transition-all max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
        <h3 class="text-xl font-bold text-gray-800">{{ __('massage.form_edit_member') }}</h3>
        <a href="{{ route('admin.members.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1">
            <i class="fas {{ app()->getLocale() == 'ar' ? 'fa-arrow-right' : 'fa-arrow-left' }}"></i> <span>{{ __('massage.form_back_to_list') }}</span>
        </a>
    </div>

    <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Name -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-user rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_name') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[ar]" required value="{{ old('name.ar', $member->getTranslation('name','ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_name_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="name[en]" required value="{{ old('name.en', $member->getTranslation('name','en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Position -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-briefcase rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_position') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_position_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="position[ar]" required value="{{ old('position.ar', $member->getTranslation('position','ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_position_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="position[en]" required value="{{ old('position.en', $member->getTranslation('position','en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Role -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-star rtl:ml-2 ltr:mr-2"></i> {{ __('massage.dt_role') }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_role_ar') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="role[ar]" required value="{{ old('role.ar', $member->getTranslation('role','ar')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ __('massage.form_role_en') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="role[en]" required value="{{ old('role.en', $member->getTranslation('role','en')) }}" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">
                        </div>
                    </div>
                </div>

                <!-- Message/Quote -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-quote-left rtl:ml-2 ltr:mr-2"></i> {{ app()->getLocale() == 'ar' ? 'رسالة / اقتباس العضو' : 'Member Message/Quote' }}</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'الرسالة (عربي)' : 'Message (AR)' }}</label>
                            <textarea name="message[ar]" rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="rtl">{{ old('message.ar', $member->getTranslation('message', 'ar', false)) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1 text-gray-600">{{ app()->getLocale() == 'ar' ? 'الرسالة (إنجليزي)' : 'Message (EN)' }}</label>
                            <textarea name="message[en]" rows="3" class="w-full p-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" dir="ltr">{{ old('message.en', $member->getTranslation('message', 'en', false)) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-6">
                    <!-- Photo -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <h4 class="font-semibold text-gray-700 mb-4 border-b pb-2"><i class="fas fa-camera rtl:ml-2 ltr:mr-2"></i> {{ __('massage.form_profile_photo') }}</h4>
                        
                        <div class="h-64 border-2 border-dashed border-blue-300 rounded-xl flex flex-col justify-center items-center bg-white hover:bg-blue-50 transition cursor-pointer group relative overflow-hidden">
                            <input type="file" name="image" id="member_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10 w-full h-full" onchange="handleImageUpload(event, 'preview_member_image', 'placeholder_member_image', 'remove_member_image', 'hidden_member_image')">
                            
                            <div id="placeholder_member_image" class="w-full h-full flex flex-col items-center justify-center p-4 text-center {{ $member->image ? 'hidden' : '' }}">
                                <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-user-edit text-2xl"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ __('massage.form_change_image') }}</span>
                            </div>
                            
                            <img id="preview_member_image" src="{{ $member->image ? url('/media/'.$member->image) : '' }}" class="absolute inset-0 w-full h-full object-cover {{ $member->image ? '' : 'hidden' }}" />
                            
                            <button id="remove_member_image" type="button" onclick="resetImageUpload('member_image', 'preview_member_image', 'placeholder_member_image', 'remove_member_image', 'hidden_member_image')" class="absolute top-2 right-2 bg-red-500 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-red-600 {{ $member->image ? '' : 'hidden' }} z-20 shadow-md transition-colors" title="Remove Photo">
                                <i class="fas fa-times"></i>
                            </button>

                            <input type="hidden" name="cropped_image" id="hidden_member_image">
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                            <i class="fas fa-save"></i>
                            <span>{{ __('massage.form_update_member') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
@endpush


