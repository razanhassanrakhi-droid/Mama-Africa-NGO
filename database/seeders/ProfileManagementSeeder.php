<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileSetting;
use App\Models\ProfileItem;

class ProfileManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Profile Settings
        ProfileSetting::updateOrCreate(
            ['id' => 1],
            [
                // Hero
                'hero_title_ar' => 'الملف المؤسسي للمنظمة',
                'hero_title_en' => 'Institutional Profile',
                'hero_subtitle_ar' => 'تعرف على هويتنا، أهدافنا، مسيرتنا التنموية وبناء قدراتنا من أجل مجتمع أفضل.',
                'hero_subtitle_en' => 'Discover our identity, goals, developmental journey, and capacity building for a better society.',
                'hero_pill1_icon' => 'fas fa-calendar-alt',
                'hero_pill1_text_ar' => 'تأسست في 22 ديسمبر 2022',
                'hero_pill1_text_en' => 'Founded 22 of December 2022',
                'hero_pill2_icon' => 'fas fa-globe-africa',
                'hero_pill2_text_ar' => 'مسجلة في السودان وأوغندا',
                'hero_pill2_text_en' => 'Registered in Sudan & Uganda',
                'hero_pill3_icon' => 'fas fa-users',
                'hero_pill3_text_ar' => '14 عضو من فريق العمل',
                'hero_pill3_text_en' => '14 Staff Members',

                // Objectives
                'objectives_title_ar' => 'أهدافنا الاستراتيجية',
                'objectives_title_en' => 'Our Strategic Objectives',

                // Timeline
                'timeline_title_ar' => 'تاريخنا ومسيرتنا',
                'timeline_title_en' => 'Our History & Journey',

                // Journey
                'journey_title_ar' => 'رحلتنا المؤسسية',
                'journey_title_en' => 'Organizational Journey',
                'journey_pos_title_ar' => 'أهم التجارب في الفترة 2022-2025',
                'journey_pos_title_en' => 'Most Important Experience in 2022-2025',
                'journey_pos_desc_ar' => 'بدأت المنظمة نشاطها بتدخلات صغيرة وفي مناطق جغرافية محدودة، وسرعان ما حققت نمواً مؤسسياً تدريجياً وتوسعاً جغرافياً لزيادة نطاق العمليات الإنسانية:',
                'journey_pos_desc_en' => 'The organization began its activities with small interventions in limited geographical areas, achieving gradual organizational growth and increased humanitarian operational reach:',
                'journey_pos_pill_icon' => 'fas fa-globe-africa',
                'journey_pos_pill_ar' => 'التسجيل الرسمي في كمبالا، أوغندا',
                'journey_pos_pill_en' => 'Registration in Kampala, Uganda',
                'journey_neg_title_ar' => 'التجارب السلبية والتحديات',
                'journey_neg_title_en' => 'Negative Experience & Challenges',
                'journey_neg_desc_ar' => 'تسببت النزاعات في اضطرابات تشغيلية ملحوظة، مما تطلب مرونة استثنائية للتكيف مع التحديات وتجاوزها:',
                'journey_neg_desc_en' => 'Conflict caused significant operational disruption, requiring exceptional resilience to adapt and overcome challenges:',

                // Capacity Assessment
                'capacity_title_ar' => 'القدرة المؤسسية والبيئة التشغيلية',
                'capacity_title_en' => 'Organizational Capacity & Operational Environment',
                'capacity_desc_ar' => 'تقييم الجاهزية التشغيلية، القوة المؤسسية، وبيئة العمل الإنساني للمنظمة.',
                'capacity_desc_en' => 'Assessing the organization’s operational readiness, institutional strength, and humanitarian working environment.',
                'capacity_summary_title_ar' => 'نظرة عامة (ملخص تنفيذي)',
                'capacity_summary_title_en' => 'Executive Summary',
                'capacity_summary_desc_ar' => 'رغم التحديات الخارجية والوضع الأمني الحساس، تُظهر المنظمة بنية مؤسسية صلبة وقدرات بشرية ممتازة.',
                'capacity_summary_desc_en' => 'Despite external challenges and a sensitive security situation, the organization demonstrates solid institutional strength and excellent human resources.',
                'capacity_internal_title_ar' => 'القدرات الداخلية',
                'capacity_internal_title_en' => 'Internal Capacities',
                'capacity_external_title_ar' => 'البيئة التشغيلية',
                'capacity_external_title_en' => 'Operational Environment',

                // Snapshot
                'snapshot_title_ar' => 'الملف المؤسسي (لمحة سريعة)',
                'snapshot_title_en' => 'Institutional Snapshot',

                // SWOT
                'swot_title_ar' => 'نقاط القوة والقدرات',
                'swot_title_en' => 'Strengths & Capacity',
                'swot_strengths_title_ar' => 'نقاط القوة',
                'swot_strengths_title_en' => 'Strengths',
                'swot_strengths_icon' => 'fas fa-dumbbell',
                'swot_weaknesses_title_ar' => 'نقاط الضعف الرئيسية',
                'swot_weaknesses_title_en' => 'Main Weaknesses',
                'swot_weaknesses_icon' => 'fas fa-exclamation-triangle',
                'swot_opportunities_title_ar' => 'الفرص',
                'swot_opportunities_title_en' => 'Opportunities',
                'swot_opportunities_icon' => 'fas fa-lightbulb',
                'swot_needs_title_ar' => 'الاحتياجات',
                'swot_needs_title_en' => 'Capacity Needs',
                'swot_needs_icon' => 'fas fa-tools',

                // Methodology
                'methodology_title_ar' => 'منهجيات المنظمة وآلية التنفيذ',
                'methodology_title_en' => 'Methodologies of the organization',
                'methodology_subtitle_ar' => 'آلية التنفيذ والعمل',
                'methodology_subtitle_en' => 'Execution Framework',
                'methodology_grants_title_ar' => 'دعم المنح',
                'methodology_grants_title_en' => 'Grants support',
                'methodology_grants_icon' => 'fas fa-hand-holding-heart',
                'methodology_me_title_ar' => 'المراقبة والتقييم',
                'methodology_me_title_en' => 'Monitoring and evaluation',
                'methodology_me_icon' => 'fas fa-chart-line',
                'methodology_cross_title_ar' => 'القضايا المتقاطعة (الشاملة)',
                'methodology_cross_title_en' => 'Cross cutting issues',
                'methodology_cross_desc_ar' => 'نعتمد في جميع تدخلاتنا على أسس ثابتة تضمن الشمولية والاستدامة.',
                'methodology_cross_desc_en' => 'We rely on steadfast foundations in all our interventions to ensure inclusivity and sustainability.',

                // Who We Serve
                'serve_title_ar' => 'من نخدم؟',
                'serve_title_en' => 'Who We Serve',
                'serve_subtitle_ar' => 'المستفيدون والشركاء المستهدفون',
                'serve_subtitle_en' => 'Target Audience',
                'serve_desc_ar' => 'دعم المجتمعات الضعيفة والتعاون مع أصحاب المصلحة الرئيسيين لخلق أثر إنساني مستدام.',
                'serve_desc_en' => 'Supporting vulnerable communities and collaborating with key stakeholders to create sustainable humanitarian impact.',

                // Contact Official
                'contact_title_ar' => 'جهة الاتصال الرسمية للمنظمة',
                'contact_title_en' => 'Official Contact Person',
                'contact_subtitle_ar' => 'للتواصل والاستفسارات الرسمية',
                'contact_subtitle_en' => 'Get in Touch',
                'contact_desc_ar' => 'للاستفسارات الخاصة بالشراكات، التنسيق، والتواصل المؤسسي الفعال.',
                'contact_desc_en' => 'For partnership inquiries, coordination, and organizational communication.',
                'contact_name_ar' => 'الدومة محمد حامد أحمد',
                'contact_name_en' => 'Aldouma Mohamed Hamid Ahmed',
                'contact_position_ar' => 'مسؤول المشروع',
                'contact_position_en' => 'Project Officer',
                'contact_email' => 'adoumamohamed013@gmail.com',
                'contact_phone' => '+256 744 198 110',
            ]
        );

        // 2. Clear existing items to avoid duplicates on re-run
        ProfileItem::truncate();

        // 3. Seed Repeatable Items
        $items = [
            // Objectives
            [
                'type' => 'objective',
                'icon' => 'fas fa-hand-holding-heart',
                'value_ar' => 'تقديم خدمات التنمية الاجتماعية والإنسانية.',
                'value_en' => 'Provide social development and humanitarian services.',
                'sort_order' => 1
            ],
            [
                'type' => 'objective',
                'icon' => 'fas fa-dove',
                'value_ar' => 'تعزيز بناء السلام والتنمية الثقافية والحماية العامة (العنف القائم على النوع).',
                'value_en' => 'Promote peace building, Culture development and general protection (GBV).',
                'sort_order' => 2
            ],
            [
                'type' => 'objective',
                'icon' => 'fas fa-seedling',
                'value_ar' => 'تحسين الأمن الغذائي وتخفيف المعاناة والمخاوف بين النازحين واللاجئين.',
                'value_en' => 'Improve Food security and Alleviate suffering and fears among the IDPs and Refugees.',
                'sort_order' => 3
            ],
            [
                'type' => 'objective',
                'icon' => 'fas fa-hands-wash',
                'value_ar' => 'الاستجابة لخدمات المياه والصرف الصحي (WASH) والخدمات الصحية.',
                'value_en' => 'Response WASH and health services.',
                'sort_order' => 4
            ],

            // History Timeline
            [
                'type' => 'timeline',
                'extra_value_ar' => '22 ديسمبر 2022',
                'extra_value_en' => '22 Dec 2022',
                'title_ar' => 'التأسيس في السودان',
                'title_en' => 'Established in Sudan',
                'sort_order' => 1
            ],
            [
                'type' => 'timeline',
                'extra_value_ar' => '31 ديسمبر 2022',
                'extra_value_en' => '31 Dec 2022',
                'title_ar' => 'بدء العمل الفعلي في السودان',
                'title_en' => 'Started work in Sudan',
                'sort_order' => 2
            ],
            [
                'type' => 'timeline',
                'extra_value_ar' => '20 مارس 2024',
                'extra_value_en' => '20 Mar 2024',
                'title_ar' => 'تجديد التسجيل القانوني',
                'title_en' => 'Registration renewed',
                'sort_order' => 3
            ],
            [
                'type' => 'timeline',
                'extra_value_ar' => '23 مايو 2025',
                'extra_value_en' => '23 May 2025',
                'title_ar' => 'التسجيل رسمياً في أوغندا',
                'title_en' => 'Registered in Uganda',
                'sort_order' => 4
            ],
            [
                'type' => 'timeline',
                'extra_value_ar' => '2025',
                'extra_value_en' => '2025',
                'title_ar' => 'توسيع التواجد إلى كمبالا وبيالي',
                'title_en' => 'Expanded presence to Kampala and Bweyale',
                'sort_order' => 5
            ],

            // Journey Positive Steps
            [
                'type' => 'journey_pos_step',
                'title_ar' => 'مدينة الفاشر',
                'title_en' => 'El Fasher City',
                'sort_order' => 1
            ],
            [
                'type' => 'journey_pos_step',
                'title_ar' => 'أرياف الفاشر',
                'title_en' => 'Rural El Fasher',
                'sort_order' => 2
            ],
            [
                'type' => 'journey_pos_step',
                'title_ar' => 'طويلة',
                'title_en' => 'Taweela',
                'sort_order' => 3
            ],
            [
                'type' => 'journey_pos_step',
                'title_ar' => 'قزان جديد',
                'title_en' => 'Gazan Jadeed',
                'sort_order' => 4
            ],

            // Journey Negative Steps
            [
                'type' => 'journey_neg_step',
                'value_ar' => 'فقدان المكتب الإداري وفريق العمل في الفاشر بسبب ظروف الحرب.',
                'value_en' => 'Loss of office and staff in El Fasher due to the war.',
                'sort_order' => 1
            ],
            [
                'type' => 'journey_neg_step',
                'value_ar' => 'صعوبات وتحديات في الحفاظ على استمرارية العمليات الميدانية.',
                'value_en' => 'Difficulties maintaining operational continuity.',
                'sort_order' => 2
            ],
            [
                'type' => 'journey_neg_step',
                'value_ar' => 'عدم استقرار التمويل والشراكات خلال فترات الأزمات المتتالية.',
                'value_en' => 'Funding and partnership instability during crisis periods.',
                'sort_order' => 3
            ],

            // Capacity Progress Bars (Internal)
            [
                'type' => 'capacity_internal',
                'title_ar' => 'الاستقرار المالي',
                'title_en' => 'Financial Stability',
                'icon' => 'fas fa-chart-line',
                'number_value' => 65,
                'extra_value_ar' => 'حالة الاستقرار: عدم استقرار معتدل',
                'extra_value_en' => 'Status: Moderate instability',
                'sort_order' => 1
            ],
            [
                'type' => 'capacity_internal',
                'title_ar' => 'الموارد البشرية',
                'title_en' => 'Human Resources',
                'icon' => 'fas fa-users',
                'number_value' => 85,
                'extra_value_ar' => 'حالة التوفر: توفر قوي',
                'extra_value_en' => 'Status: Strong availability',
                'sort_order' => 2
            ],
            [
                'type' => 'capacity_internal',
                'title_ar' => 'البيئة المؤسسية',
                'title_en' => 'Institutional Environment',
                'icon' => 'fas fa-sitemap',
                'number_value' => 90,
                'extra_value_ar' => 'الحالة: داعمة بشكل كبير',
                'extra_value_en' => 'Status: Highly supportive',
                'sort_order' => 3
            ],
            [
                'type' => 'capacity_internal',
                'title_ar' => 'القدرة المؤسسية',
                'title_en' => 'Organizational Capacity',
                'icon' => 'fas fa-cogs',
                'number_value' => 85,
                'extra_value_ar' => 'الحالة: قدرة تشغيلية قوية',
                'extra_value_en' => 'Status: Strong operational capacity',
                'sort_order' => 4
            ],

            // Capacity Progress Bars (External)
            [
                'type' => 'capacity_external',
                'title_ar' => 'البيئة الاجتماعية',
                'title_en' => 'Social Environment',
                'icon' => 'fas fa-hands-helping',
                'number_value' => 65,
                'extra_value_ar' => 'الحالة: مرنة',
                'extra_value_en' => 'Status: Flexible',
                'sort_order' => 1
            ],
            [
                'type' => 'capacity_external',
                'title_ar' => 'البيئة السياسية',
                'title_en' => 'Political Environment',
                'icon' => 'fas fa-balance-scale',
                'number_value' => 55,
                'extra_value_ar' => 'الحالة: مرنة باعتدال',
                'extra_value_en' => 'Status: Moderately flexible',
                'sort_order' => 2
            ],
            [
                'type' => 'capacity_external',
                'title_ar' => 'الوضع الأمني',
                'title_en' => 'Security Situation',
                'icon' => 'fas fa-shield-virus',
                'number_value' => 55,
                'extra_value_ar' => 'الحالة: بيئة تشغيلية حساسة',
                'extra_value_en' => 'Status: Sensitive operational environment',
                'sort_order' => 3
            ],

            // Snapshot Section
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-file-signature',
                'title_ar' => 'الحالة القانونية',
                'title_en' => 'Legal Status',
                'value_ar' => 'مسجلة في السودان وأوغندا',
                'value_en' => 'Registered in Sudan and Uganda',
                'sort_order' => 1
            ],
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-map-marked-alt',
                'title_ar' => 'التغطية الجغرافية',
                'title_en' => 'Geographic Coverage',
                'value_ar' => 'السودان (دارفور) - أوغندا (كمبالا - بويالي)',
                'value_en' => 'Sudan – Darfur, Uganda – Kampala – Bweyale',
                'sort_order' => 2
            ],
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-user-tie',
                'title_ar' => 'فريق العمل',
                'title_en' => 'Staff Members',
                'value_ar' => '14',
                'value_en' => '14',
                'sort_order' => 3
            ],
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-users-cog',
                'title_ar' => 'النساء في الأدوار القيادية',
                'title_en' => 'Women in leadership roles',
                'value_ar' => '7',
                'value_en' => '7',
                'sort_order' => 4
            ],
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-female',
                'title_ar' => 'النساء في فريق العمل',
                'title_en' => 'Women in staff',
                'value_ar' => '7',
                'value_en' => '7',
                'sort_order' => 5
            ],
            [
                'type' => 'snapshot',
                'icon' => 'fas fa-hands-helping',
                'title_ar' => 'مجالات التدخل',
                'title_en' => 'Intervention Areas',
                'value_ar' => 'التنمية والمساعدات',
                'value_en' => 'Development & Relief',
                'sort_order' => 6
            ],

            // SWOT Strengths
            [
                'type' => 'swot_strength',
                'value_ar' => 'التسجيل الرسمي المعتمد في السودان وأوغندا',
                'value_en' => 'Official registration in Sudan & Uganda',
                'sort_order' => 1
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'الولاية والنهج التنموي والإنساني الواضح',
                'value_en' => 'Clear mandate and humanitarian/developmental approach',
                'sort_order' => 2
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'مجالات التدخل المتنوعة (التنمية والإغاثة)',
                'value_en' => 'Diverse intervention areas (Development & Relief)',
                'sort_order' => 3
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'قاعدة واسعة من أصحاب المصلحة والمستفيدين',
                'value_en' => 'Broad network of stakeholders & beneficiaries',
                'sort_order' => 4
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'التغطية الجغرافية الواسعة (دارفور، كمبالا، بويالي)',
                'value_en' => 'Extensive geographic coverage (Darfur, Kampala, Bweyale)',
                'sort_order' => 5
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'مكاتب فعلية قائمة وتواجد ميداني مستمر',
                'value_en' => 'Active physical offices & continuous field presence',
                'sort_order' => 6
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'قيادة شابة ومؤهلة مع تمثيل نسائي قوي',
                'value_en' => 'Qualified leadership with strong women representation',
                'sort_order' => 7
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'قنوات اتصال رسمية وفعالة ومتاحة للجميع',
                'value_en' => 'Official, active, and accessible contact channels',
                'sort_order' => 8
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'فريق عمل محلي مؤهل ومكرس للعمل الإنساني',
                'value_en' => 'Dedicated local staff with technical expertise',
                'sort_order' => 9
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'نظام مالي وحسابات بنكية رسمية وشفافة',
                'value_en' => 'Official, transparent bank accounts and financial systems',
                'sort_order' => 10
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'خبرات ميدانية سابقة ونجاحات متراكمة في الميدان',
                'value_en' => 'Proven track record and accumulated field experiences',
                'sort_order' => 11
            ],
            [
                'type' => 'swot_strength',
                'value_ar' => 'شراكات وثيقة مع المجتمعات المحلية والجهات الفاعلة',
                'value_en' => 'Strong partnerships with local communities and actors',
                'sort_order' => 12
            ],

            // SWOT Weaknesses
            [
                'type' => 'swot_weakness',
                'value_ar' => 'تحديات البنية التحتية للموقع الإلكتروني والتكنولوجيا',
                'value_en' => 'Website and IT technology limitations',
                'sort_order' => 1
            ],
            [
                'type' => 'swot_weakness',
                'value_ar' => 'محدودية الشراكات الإستراتيجية الحالية',
                'value_en' => 'Limited strategic partnerships',
                'sort_order' => 2
            ],
            [
                'type' => 'swot_weakness',
                'value_ar' => 'الاعتماد على مصادر تمويل محدودة وغير متنوعة',
                'value_en' => 'Dependency on limited and non-diversified funding sources',
                'sort_order' => 3
            ],
            [
                'type' => 'swot_weakness',
                'value_ar' => 'الحاجة إلى توسيع وتفعيل قاعدة العضوية والانتساب',
                'value_en' => 'Need to expand and activate organizational membership',
                'sort_order' => 4
            ],

            // SWOT Opportunities
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'السمعة الممتازة والموثوقية العالية في الميدان',
                'value_en' => 'Excellent reputation and high field reliability',
                'sort_order' => 1
            ],
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'العلاقات الممتدة والقوية مع الشركاء المحليين',
                'value_en' => 'Extended and strong relationships with local partners',
                'sort_order' => 2
            ],
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'بناء شبكات تواصل وتنسيق فعالة مع الجهات الفاعلة',
                'value_en' => 'Effective networking and coordination with key actors',
                'sort_order' => 3
            ],
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'القبول والترحيب المجتمعي الكبير بالمنظمة وتدخلاتها',
                'value_en' => 'Strong community acceptance and trust in interventions',
                'sort_order' => 4
            ],
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'فرص التوسع الجغرافي لمناطق عمل جديدة محلياً وإقليمياً',
                'value_en' => 'Potential for geographic expansion to new operational areas',
                'sort_order' => 5
            ],
            [
                'type' => 'swot_opportunity',
                'value_ar' => 'روح المبادرة والابتكار في إيجاد حلول للمشاكل المجتمعية',
                'value_en' => 'Strong spirit of initiative and innovation in community solutions',
                'sort_order' => 6
            ],

            // SWOT Needs
            [
                'type' => 'swot_need',
                'value_ar' => 'بناء القدرات الفنية والتقنية للموظفين',
                'value_en' => 'Technical capacity building for staff',
                'sort_order' => 1
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تنويع الشراكات ومصادر التمويل المستدام',
                'value_en' => 'Diversification of partnerships & funding sources',
                'sort_order' => 2
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تطوير الموقع الإلكتروني وتكنولوجيا المعلومات',
                'value_en' => 'Development of the website & IT infrastructure',
                'sort_order' => 3
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'إنشاء منصة إعلامية متكاملة للمنظمة',
                'value_en' => 'Establishing a comprehensive organizational media platform',
                'sort_order' => 4
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تفعيل قنوات وصفحات التواصل الاجتماعي',
                'value_en' => 'Activating social media pages & digital outreach',
                'sort_order' => 5
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تعزيز أنظمة الحوكمة واللوائح المؤسسية الداخلية',
                'value_en' => 'Enhancing institutional governance & internal regulations',
                'sort_order' => 6
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تفعيل البريد الإلكتروني الرسمي لجميع الأقسام',
                'value_en' => 'Activating official institutional email for all departments',
                'sort_order' => 7
            ],
            [
                'type' => 'swot_need',
                'value_ar' => 'تطوير خطة استراتيجية شاملة للمستقبل',
                'value_en' => 'Developing a comprehensive long-term strategic plan',
                'sort_order' => 8
            ],

            // Methodology Grants
            [
                'type' => 'methodology_grant',
                'icon' => 'fas fa-coins',
                'title_ar' => 'منح صغيرة',
                'title_en' => 'Micro grant',
                'value_ar' => 'دعم الأفراد والمبادرات المجتمعية المباشرة.',
                'value_en' => 'Supporting individuals and direct community initiatives.',
                'sort_order' => 1
            ],
            [
                'type' => 'methodology_grant',
                'icon' => 'fas fa-store',
                'title_ar' => 'منح المشاريع',
                'title_en' => 'Enterprise grant',
                'value_ar' => 'توفير الدعم للأعمال ومشاريع التنمية المستدامة.',
                'value_en' => 'Support for businesses and sustainable development projects.',
                'sort_order' => 2
            ],

            // Methodology M&E
            [
                'type' => 'methodology_me',
                'icon' => 'fas fa-map-marked-alt',
                'title_ar' => 'الزيارات الميدانية',
                'title_en' => 'Physical visits',
                'value_ar' => 'تقييمات على أرض الواقع لضمان جودة الأداء.',
                'value_en' => 'On-site assessments to ensure performance quality.',
                'sort_order' => 1
            ],
            [
                'type' => 'methodology_me',
                'icon' => 'fas fa-laptop-house',
                'title_ar' => 'التحقق الإلكتروني',
                'title_en' => 'Online verifications',
                'value_ar' => 'استخدام أنظمة رقمية للتحقق والمتابعة عن بُعد.',
                'value_en' => 'Using digital systems for remote verification.',
                'sort_order' => 2
            ],

            // Methodology Cross Cutting
            [
                'type' => 'cross_cutting',
                'icon' => 'fas fa-shield-alt',
                'title_ar' => 'حساسية ديناميكيات النزاع',
                'title_en' => 'Conflict dynamics sensitivity',
                'sort_order' => 1
            ],
            [
                'type' => 'cross_cutting',
                'icon' => 'fas fa-venus-mars',
                'title_ar' => 'مراعاة النوع الاجتماعي والفئات الضعيفة',
                'title_en' => 'Gender & vulnerable group’s consideration',
                'sort_order' => 2
            ],
            [
                'type' => 'cross_cutting',
                'icon' => 'fas fa-leaf',
                'title_ar' => 'حماية البيئة وتغير المناخ',
                'title_en' => 'Environment and climate change protection',
                'sort_order' => 3
            ],
            [
                'type' => 'cross_cutting',
                'icon' => 'fas fa-network-wired',
                'title_ar' => 'التنسيق والتعاون',
                'title_en' => 'Coordination & collaboration',
                'sort_order' => 4
            ],
            [
                'type' => 'cross_cutting',
                'icon' => 'fas fa-hands-helping',
                'title_ar' => 'المبادئ الإنسانية',
                'title_en' => 'Humanitarian principles',
                'sort_order' => 5
            ],

            // Target Audience
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-handshake',
                'title_ar' => 'الشركاء',
                'title_en' => 'Partners',
                'value_ar' => 'التعاون مع المنظمات الدولية والمحلية لتوسيع نطاق التأثير الإيجابي.',
                'value_en' => 'Collaborating with international and local organizations to scale impact.',
                'sort_order' => 1
            ],
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-landmark',
                'title_ar' => 'المؤسسات الحكومية',
                'title_en' => 'Government Institutions',
                'value_ar' => 'التنسيق مع السلطات المحلية والوطنية لضمان التوافق وتسهيل العمليات الإنسانية.',
                'value_en' => 'Coordinating with local and national authorities to ensure alignment.',
                'sort_order' => 2
            ],
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-users-cog',
                'title_ar' => 'القادة المحليون',
                'title_en' => 'Local Leaders',
                'value_ar' => 'إشراك قادة المجتمع المحلي بفاعلية في صنع القرار وتصميم البرامج.',
                'value_en' => 'Engaging community leaders in decision-making and program design.',
                'sort_order' => 3
            ],
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-campground',
                'title_ar' => 'النازحون واللاجئون',
                'title_en' => 'IDPs & Refugees',
                'value_ar' => 'توفير الحماية والمساعدات الإنسانية الطارئة للمهجرين قسراً واللاجئين.',
                'value_en' => 'Providing protection and emergency humanitarian aid for displaced persons.',
                'sort_order' => 4
            ],
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-house-damage',
                'title_ar' => 'المجتمعات المتأثرة بالحرب',
                'title_en' => 'War-Affected Communities',
                'value_ar' => 'إعادة التأهيل والدعم النفسي والاجتماعي الشامل للسكان المتضررين من النزاعات.',
                'value_en' => 'Rehabilitation and psychosocial support for conflict-affected populations.',
                'sort_order' => 5
            ],
            [
                'type' => 'serve_audience',
                'icon' => 'fas fa-home',
                'title_ar' => 'الأسر والمستفيدون غير المباشرين',
                'title_en' => 'Households & Indirect Beneficiaries',
                'value_ar' => 'الوصول للعائلات بأكملها لخلق تنمية مستدامة تحسن سبل العيش للجميع.',
                'value_en' => 'Reaching entire families to create sustainable development and better livelihoods.',
                'sort_order' => 6
            ],
        ];

        foreach ($items as $item) {
            ProfileItem::create($item);
        }
    }
}
