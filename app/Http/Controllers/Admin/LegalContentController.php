<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalContent;
use Illuminate\Http\Request;

class LegalContentController extends Controller
{
    public function index()
    {
        $privacy = LegalContent::firstOrCreate(['page_type' => 'privacy'], [
            'phone' => '+256 783 750109',
            'email' => 'mamaafricamao@gmail.com',
            'title_ar' => 'سياسة الخصوصية',
            'title_en' => 'Privacy Policy',
            'intro_ar' => 'نحن في منظمة ماما أفريكا نولي أهمية كبرى لخصوصيتك. توضح هذه السياسة كيفية جمعنا واستخدامنا وحمايتنا لمعلوماتك الشخصية.',
            'intro_en' => 'At Mama Africa, we take your privacy seriously. This policy explains how we collect, use, and protect your personal information.',
            'privacy_intro_long_ar' => 'تلتزم المنظمة بحماية بيانات جميع المتبرعين والشركاء والمستفيدين.',
            'privacy_intro_long_en' => 'The organization is committed to protecting the data of all donors, partners, and beneficiaries.',
            's1_title_ar' => 'جمع المعلومات',
            's1_title_en' => 'Information Collection',
            's1_content_ar' => 'نقوم بجمع المعلومات التي تقدمها لنا مباشرة عند التسجيل أو التبرع.',
            's1_content_en' => 'We collect information you provide directly to us when registering or donating.',
            's2_title_ar' => 'استخدام المعلومات',
            's2_title_en' => 'Use of Information',
            's2_content_ar' => 'نستخدم معلوماتك لتحسين خدماتنا ومعالجة التبرعات والتواصل معك.',
            's2_content_en' => 'We use your information to improve our services, process donations, and communicate with you.',
            's3_title_ar' => 'أمن البيانات',
            's3_title_en' => 'Data Security',
            's3_content_ar' => 'نحن نطبق إجراءات أمنية صارمة لحماية بياناتك من الوصول غير المصرح به.',
            's3_content_en' => 'We implement strict security measures to protect your data from unauthorized access.',
            's4_title_ar' => 'الأطراف الثالثة',
            's4_title_en' => 'Third Party',
            's4_content_ar' => 'لا نقوم ببيع أو مشاركة بياناتك مع أطراف ثالثة لأغراض تسويقية.',
            's4_content_en' => 'We do not sell or share your data with third parties for marketing purposes.',
            's5_title_ar' => 'ملفات التعرّيف (Cookies)',
            's5_title_en' => 'Cookies',
            's5_content_ar' => 'نستخدم ملفات تعريف الارتباط لتحسين تجربة المستخدم على موقعنا.',
            's5_content_en' => 'We use cookies to enhance the user experience on our website.',
            's6_title_ar' => 'اتصل بنا',
            's6_title_en' => 'Contact Us',
            's6_content_ar' => 'إذا كان لديك أي أسئلة، يمكنك التواصل معنا عبر البريد الإلكتروني.',
            's6_content_en' => 'If you have any questions, you can contact us via email.',
        ]);

        $terms = LegalContent::firstOrCreate(['page_type' => 'terms'], [
            'phone' => '+256 783 750109',
            'email' => 'mamaafricamao@gmail.com',
            'title_ar' => 'شروط الخدمة',
            'title_en' => 'Terms of Service',
            'intro_ar' => 'باستخدامك لموقعنا، فإنك توافق على الالتزام بالشروط والأحكام التالية.',
            'intro_en' => 'By using our website, you agree to comply with the following terms and conditions.',
            's1_title_ar' => 'اتفاقية المستخدم',
            's1_title_en' => 'User Agreement',
            's1_content_ar' => 'يجب استخدام الموقع للأغراض القانونية فقط وبما لا ينتهك حقوق الآخرين.',
            's1_content_en' => 'The site must be used for lawful purposes only and in a way that does not violate the rights of others.',
            's2_title_ar' => 'سياسة الخصوصية',
            's2_title_en' => 'Privacy Policy',
            's2_content_ar' => 'تخضع جميع البيانات التي تقدمها لسياسة الخصوصية الخاصة بنا.',
            's2_content_en' => 'All data you provide is subject to our privacy policy.',
            's3_title_ar' => 'أمن الحساب',
            's3_title_en' => 'Account Security',
            's3_content_ar' => 'أنت مسؤول عن الحفاظ على سرية معلومات حسابك وكلمة المرور.',
            's3_content_en' => 'You are responsible for maintaining the confidentiality of your account information and password.',
            's4_title_ar' => 'الملكية الفكرية',
            's4_title_en' => 'Intellectual Property',
            's4_content_ar' => 'جميع محتويات الموقع مملوكة للمنظمة ومحمية بموجب قوانين الملكية الفكرية.',
            's4_content_en' => 'All content on the site is owned by the organization and protected under intellectual property laws.',
            's5_title_ar' => 'تحديد المسؤولية',
            's5_title_en' => 'Limitation of Liability',
            's5_content_ar' => 'المنظمة ليست مسؤولة عن أي أضرار ناتجة عن استخدام أو عدم القدرة على استخدام الموقع.',
            's5_content_en' => 'The organization is not liable for any damages resulting from the use or inability to use the site.',
        ]);

        return view('admin.legal.index', compact('privacy', 'terms'));
    }

    public function update(Request $request, $id)
    {
        $content = LegalContent::findOrFail($id);
        $content->update($request->all());

        return redirect()->back()->with('success', app()->getLocale() == 'ar' ? 'تم تحديث المحتوى بنجاح.' : 'Content updated successfully.');
    }
}
