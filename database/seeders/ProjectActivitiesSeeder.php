<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectActivity;
use App\Models\Projects;

class ProjectActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing project activities to avoid duplicates and start fresh with website content
        ProjectActivity::truncate();

        // 1. Healthcare (ID: 36)
        $healthcare = Projects::find(36);
        if ($healthcare) {
            $act = new ProjectActivity();
            $act->project_id = 36;
            $act->setTranslation('title', 'ar', 'تقييم الصحة العامة للنازحين بالفاشر');
            $act->setTranslation('title', 'en', 'Public Health Assessment for IDPs');
            $act->setTranslation('description', 'ar', 'إجراء التقييم الشامل للصحة العامة للنازحين في الفاشر بتمويل من منظمة الطب الشمولي للشؤون الاجتماعية.');
            $act->setTranslation('description', 'en', 'Conducted a public health assessment for IDPs in El Fasher to identify urgent medical needs.');
            $act->setTranslation('detail', 'ar', 'بتمويل من مؤسسة الطب الشمولي للشؤون الاجتماعية بقيمة 3,000 دولار.');
            $act->setTranslation('detail', 'en', 'Funded by Holistic Medicine social affairs with amount of 3,000 USD.');
            $act->setTranslation('location', 'ar', 'الفاشر');
            $act->setTranslation('location', 'en', 'El Fasher');
            $act->setTranslation('date', 'ar', 'أبريل – مايو 2024');
            $act->setTranslation('date', 'en', 'Apr – May 2024');
            $act->setTranslation('funded_by', 'ar', 'الطب الشمولي للشؤون الاجتماعية');
            $act->setTranslation('funded_by', 'en', 'Holistic Medicine Social Affairs');
            $act->amount = '3,000 USD';
            $act->setTranslation('status', 'ar', 'مكتمل');
            $act->setTranslation('status', 'en', 'Completed');
            $act->icon = 'fas fa-notes-medical';
            $act->save();
        }

        // 2. Water Sanitation (ID: 37)
        $water = Projects::find(37);
        if ($water) {
            // Activity 1
            $act = new ProjectActivity();
            $act->project_id = 37;
            $act->setTranslation('title', 'ar', 'توزيع المياه النقية بريف الفاشر (الشجرة)');
            $act->setTranslation('title', 'en', 'Distribution of Pure Water in Rural El Fasher (SHAGARA)');
            $act->setTranslation('description', 'ar', 'توزيع مياه شرب نقية وصالحة للأسر النازحة بريف الفاشر (منطقة الشجرة) لتأمين الحصول على مياه نظيفة وصحية.');
            $act->setTranslation('description', 'en', 'WASH distributed pure water to the rural El fasher (SHAGARA) to ensure access to clean drinking water.');
            $act->setTranslation('detail', 'ar', 'بتمويل من منظمة بحر الجود للسلام والتنمية بمبلغ إجمالي قدره 500 دولار.');
            $act->setTranslation('detail', 'en', 'Funded by Jael Sea Organization for peace development with total 500 USD.');
            $act->setTranslation('location', 'ar', 'ريف الفاشر (الشجرة)، شمال دارفور، السودان');
            $act->setTranslation('location', 'en', 'Rural El Fasher (SHAGARA), North Darfur, Sudan');
            $act->setTranslation('date', 'ar', 'مارس – أبريل 2024');
            $act->setTranslation('date', 'en', 'March – April 2024');
            $act->setTranslation('funded_by', 'ar', 'منظمة بحر الجود للسلام والتنمية');
            $act->setTranslation('funded_by', 'en', 'Jael Sea Organization for Peace and Development');
            $act->amount = '500 USD';
            $act->setTranslation('status', 'ar', 'مكتمل');
            $act->setTranslation('status', 'en', 'Completed');
            $act->icon = 'fas fa-tint';
            $act->save();

            // Activity 2
            $act = new ProjectActivity();
            $act->project_id = 37;
            $act->setTranslation('title', 'ar', 'حملات النظافة العامة والإصحاح البيئي');
            $act->setTranslation('title', 'en', 'Environmental Clean-up & Sanitation Campaigns');
            $act->setTranslation('description', 'ar', 'إجراء دورات تدريبية وإطلاق حملات تنظيف بيئية مجتمعية لتعزيز الوعي الصحي والإصحاح البيئي بمراكز الإيواء.');
            $act->setTranslation('description', 'en', 'WASH conducted training sessions and launched environmental clean-up campaigns to promote hygiene.');
            $act->setTranslation('detail', 'ar', 'تدريب وبناء قدرات المجتمع على الإصحاح البيئي ومكافحة التلوث.');
            $act->setTranslation('detail', 'en', 'WASH conducted training through environmental clean-up campaigns.');
            $act->setTranslation('location', 'ar', 'مراكز الإيواء وأحياء الفاشر، السودان');
            $act->setTranslation('location', 'en', 'Shelter centers and neighborhoods in El Fasher, Sudan');
            $act->setTranslation('date', 'ar', '2024 – 2025');
            $act->setTranslation('date', 'en', '2024 – 2025');
            $act->setTranslation('funded_by', 'ar', 'متطوعون ومساهمات مجتمعية');
            $act->setTranslation('funded_by', 'en', 'Community Volunteers');
            $act->amount = 'Voluntary';
            $act->setTranslation('status', 'ar', 'مستمر');
            $act->setTranslation('status', 'en', 'Ongoing');
            $act->icon = 'fas fa-tint';
            $act->save();
        }

        // 3. Protection (ID: 38)
        $protection = Projects::find(38);
        if ($protection) {
            $protectionActivities = [
                [
                    'title_ar' => 'حماية النساء والفتيات عبر الدعم النفسي والاجتماعي',
                    'title_en' => 'Women & Girls Protection through Psychosocial Support',
                    'desc_ar' => 'تقديم خدمات الدعم النفسي والاجتماعي المتكامل لتعزيز حماية النساء والفتيات في مراكز إيواء الفاشر.',
                    'desc_en' => 'Women & Girls Protection through psychosocial support services to build resilience.',
                    'detail_ar' => 'بتمويل من مركز مستقبل النجم بمبلغ إجمالي قدره 5,000 دولار.',
                    'detail_en' => 'Funded by Star Future Center during May to July 2024 with total amount 5,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                    'date_ar' => 'مايو – يوليو 2024',
                    'date_en' => 'May – July 2024',
                    'funded_ar' => 'مركز مستقبل النجم',
                    'funded_en' => 'Star Future Center',
                    'amount' => '5,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'تدريب وبناء القدرات في الحماية والدعم النفسي',
                    'title_en' => 'Protection Training & Psychosocial Support',
                    'desc_ar' => 'بناء قدرات المجتمع والعاملين المحليين حول آليات تقديم الدعم النفسي والاجتماعي لتعزيز الحماية بمراكز الإيواء بالفاشر.',
                    'desc_en' => 'Protection training conducted through psychosocial support at shelter centers.',
                    'detail_ar' => 'بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.',
                    'detail_en' => 'Funded by Otash organization for development and peace with total amount 900 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                    'date_ar' => 'أكتوبر 2024',
                    'date_en' => 'October 2024',
                    'funded_ar' => 'منظمة أوتاش للتنمية والسلام',
                    'funded_en' => 'Otash Organization for Development and Peace',
                    'amount' => '900 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'دعم الحماية والخدمات النفسية والاجتماعية للنازحين',
                    'title_en' => 'Protection through Psychosocial Support',
                    'desc_ar' => 'توفير آليات الحماية والدعم النفسي والاجتماعي للأسر النازحة بمراكز الإيواء بالفاشر.',
                    'desc_en' => 'Protection through psychosocial support services to support families.',
                    'detail_ar' => 'بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.',
                    'detail_en' => 'Funded by Sons of Darfur organization in Switzerland with total amount 1,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، السودان',
                    'location_en' => 'El Fasher shelter center, Sudan',
                    'date_ar' => 'ديسمبر 2024',
                    'date_en' => 'December 2024',
                    'funded_ar' => 'منظمة أبناء دارفور في سويسرا',
                    'funded_en' => 'Sons of Darfur Organization in Switzerland',
                    'amount' => '1,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'تعزيز الحماية والدعم النفسي في منطقة غزن جديد',
                    'title_en' => 'Protection through Psychosocial Support',
                    'desc_ar' => 'تقديم برامج حماية متكاملة وخدمات الدعم النفسي والاجتماعي بمناطق الفاشر (غزن جديد).',
                    'desc_en' => 'Protection through psychosocial support program for displaced communities.',
                    'detail_ar' => 'بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.',
                    'detail_en' => 'Funded by Safer World at El Fasher (Ghazan Jadeed) with amount 11,000 USD.',
                    'location_ar' => 'الفاشر - غزن جديد - شمال دارفور، السودان',
                    'location_en' => 'El Fasher – Ghazan Jadeed – North Darfur, Sudan',
                    'date_ar' => 'يناير – فبراير 2025',
                    'date_en' => 'Jan – Feb 2025',
                    'funded_ar' => 'منظمة سيفروورلد',
                    'funded_en' => 'Safer World',
                    'amount' => '11,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'الدعم النفسي والاجتماعي بريف ومراكز إيواء الفاشر',
                    'title_en' => 'Protection through Psychosocial Support Services',
                    'desc_ar' => 'تسيير وإطلاق جلسات وأنشطة حماية مجتمعية ودعم نفسي في ريف الفاشر ومراكز الإيواء.',
                    'desc_en' => 'Protection through psychosocial support conducted in rural areas and shelters.',
                    'detail_ar' => 'بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ إجمالي قدره 1,000 دولار.',
                    'detail_en' => 'Conducted by MAMA Africa organization for humanitarian services with total amount 1,000 USD.',
                    'location_ar' => 'ريف الفاشر ومراكز الإيواء، السودان',
                    'location_en' => 'El Fasher Rural area and shelter center, Sudan',
                    'date_ar' => 'مارس 2025',
                    'date_en' => 'March 2025',
                    'funded_ar' => 'منظمة ماما أفريقيا للخدمات الإنسانية',
                    'funded_en' => 'MAMA Africa Organization for Humanitarian Services',
                    'amount' => '1,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'الحماية والخدمات الاجتماعية للنازحين بالفاشر',
                    'title_en' => 'Protection & Social Services Support',
                    'desc_ar' => 'تعزيز وتنسيق أنشطة الحماية والدعم النفسي والاجتماعي للنازحين داخل مراكز الإيواء بالفاشر.',
                    'desc_en' => 'Protection through psychosocial support conducted at shelter centers.',
                    'detail_ar' => 'بدعم من وزارة الشؤون الاجتماعية بقيمة إجمالية بلغت 2,000 دولار.',
                    'detail_en' => 'Conducted by the Ministry of Social Affairs with total amount 2,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                    'date_ar' => 'مايو 2025',
                    'date_en' => 'May 2025',
                    'funded_ar' => 'وزارة الشؤون الاجتماعية',
                    'funded_en' => 'Ministry of Social Affairs',
                    'amount' => '2,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'مشروع المساحات الآمنة للحماية ودعم سبل العيش للنساء والفتيات',
                    'title_en' => 'Protection & Livelihood Support: Safe Space for Women & Girls',
                    'desc_ar' => 'تأسيس وتشغيل مساحات آمنة لتقديم برامج حماية متكاملة ودعم سبل كسب العيش للنساء والفتيات بالفاشر.',
                    'desc_en' => 'Protection and livelihood support project: safe space for women and girls.',
                    'detail_ar' => 'بتمويل من DTI بقيمة إجمالية قدرها 19,982 دولار.',
                    'detail_en' => 'Funded by DTI with total 19,982 USD from April to July 2025.',
                    'location_ar' => 'الفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher, North Darfur, Sudan',
                    'date_ar' => 'أبريل – يوليو 2025',
                    'date_en' => 'April – July 2025',
                    'funded_ar' => 'مبادرة الانتقال الديمقراطي (DTI)',
                    'funded_en' => 'Democratic Transition Initiative (DTI)',
                    'amount' => '19,982 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ]
            ];

            foreach ($protectionActivities as $item) {
                $act = new ProjectActivity();
                $act->project_id = 38;
                $act->setTranslation('title', 'ar', $item['title_ar']);
                $act->setTranslation('title', 'en', $item['title_en']);
                $act->setTranslation('description', 'ar', $item['desc_ar']);
                $act->setTranslation('description', 'en', $item['desc_en']);
                $act->setTranslation('detail', 'ar', $item['detail_ar']);
                $act->setTranslation('detail', 'en', $item['detail_en']);
                $act->setTranslation('location', 'ar', $item['location_ar']);
                $act->setTranslation('location', 'en', $item['location_en']);
                $act->setTranslation('date', 'ar', $item['date_ar']);
                $act->setTranslation('date', 'en', $item['date_en']);
                $act->setTranslation('funded_by', 'ar', $item['funded_ar']);
                $act->setTranslation('funded_by', 'en', $item['funded_en']);
                $act->amount = $item['amount'];
                $act->setTranslation('status', 'ar', $item['status_ar']);
                $act->setTranslation('status', 'en', $item['status_en']);
                $act->icon = 'fas fa-shield-alt';
                $act->save();
            }
        }

        // 4. Food Security (ID: 39)
        $food = Projects::find(39);
        if ($food) {
            $foodActivities = [
                [
                    'title_ar' => 'توفير مواد الأمن الغذائي (المطابخ المشتركة والسلال الغذائية) للنازحين',
                    'title_en' => 'Provision of Food Security Materials (Communal Kitchen & Food Baskets) to IDPs',
                    'desc_ar' => 'توفير وتوزيع مواد الأمن الغذائي بما في ذلك المطابخ المشتركة وسلال الغذاء للأسر النازحة بمراكز الإيواء بالفاشر.',
                    'desc_en' => 'Provision of food security materials (communal kitchen, foods baskets) to the IDPs.',
                    'detail_ar' => 'بتمويل من منظمة بلان السودان بقيمة إجمالية قدرها 2,000 دولار.',
                    'detail_en' => 'Funded by Plan Sudan with total of 2,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher - Shelters center, North Darfur, Sudan',
                    'date_ar' => 'مارس – أبريل 2024',
                    'date_en' => 'March – April 2024',
                    'funded_ar' => 'منظمة بلان السودان',
                    'funded_en' => 'Plan Sudan',
                    'amount' => '2,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                    'icon' => 'fas fa-utensils'
                ],
                [
                    'title_ar' => 'تشغيل المطبخ المشترك لتعزيز الأمن الغذائي',
                    'title_en' => 'Food Security through Communal Kitchen',
                    'desc_ar' => 'تشغيل المطابخ المشتركة لتوفير الوجبات اليومية للنازحين في مراكز الإيواء بالفاشر.',
                    'desc_en' => 'Conducted Food security through communal kitchen for displaced people in shelters.',
                    'detail_ar' => 'بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.',
                    'detail_en' => 'Funded by Otash organization for development and peace during Oct 2024.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center - North Darfur, Sudan',
                    'date_ar' => 'أكتوبر 2024',
                    'date_en' => 'October 2024',
                    'funded_ar' => 'منظمة أوتاش للتنمية والسلام',
                    'funded_en' => 'Otash Organization for Development and Peace',
                    'amount' => '900 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                    'icon' => 'fas fa-utensils'
                ],
                [
                    'title_ar' => 'المطبخ المشترك بتمويل من منظمة أبناء دارفور في سويسرا',
                    'title_en' => 'Communal Kitchen Food Security Support',
                    'desc_ar' => 'تأمين الغذاء وتوفير الوجبات من خلال المطابخ المشتركة لدعم الأسر في مراكز الإيواء بالفاشر.',
                    'desc_en' => 'Conducted Food Security through communal kitchen at El Fasher shelter center.',
                    'detail_ar' => 'بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.',
                    'detail_en' => 'Funded by sons of Darfur organization in Switzerland with total amount 1,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، السودان',
                    'location_en' => 'El Fasher Shelter center, Sudan',
                    'date_ar' => 'ديسمبر 2024',
                    'date_en' => 'December 2024',
                    'funded_ar' => 'منظمة أبناء دارفور في سويسرا',
                    'funded_en' => 'Sons of Darfur Organization in Switzerland',
                    'amount' => '1,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                    'icon' => 'fas fa-utensils'
                ],
                [
                    'title_ar' => 'توزيع المواد الغذائية وغير الغذائية لدعم الأمن الغذائي',
                    'title_en' => 'Distribution of Food and Non-Food Items',
                    'desc_ar' => 'تعزيز الأمن الغذائي من خلال توزيع سلال غذائية ومواد غير غذائية للنازحين في الفاشر (غزن جديد).',
                    'desc_en' => 'Reinforce Food Security through distributions of food and non-food items.',
                    'detail_ar' => 'بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.',
                    'detail_en' => 'Funded by Safer World with total amount 11,000 USD.',
                    'location_ar' => 'الفاشر - غزن جديد - شمال دارفور، السودان',
                    'location_en' => 'El Fasher – Ghazan Jadeed – North Darfur, Sudan',
                    'date_ar' => 'يناير – فبراير 2025',
                    'date_en' => 'Jan – Feb 2025',
                    'funded_ar' => 'منظمة سيفروورلد',
                    'funded_en' => 'Safer World',
                    'amount' => '11,000 USD',
                    'status_ar' => 'مستمر',
                    'status_en' => 'Ongoing',
                    'icon' => 'fas fa-box-open'
                ],
                [
                    'title_ar' => 'برنامج الدعم النقدي مقابل الغذاء',
                    'title_en' => 'Cash for Food Assistance',
                    'desc_ar' => 'تقديم مساعدات مالية مباشرة لدعم قدرة الأسر النازحة على شراء وتأمين احتياجاتها الغذائية.',
                    'desc_en' => 'Conducted Food Security by cash for food to support displaced families.',
                    'detail_ar' => 'بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ 1,000 دولار.',
                    'detail_en' => 'Supported by MAMA Africa Organization for humanitarian services.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                    'date_ar' => 'فبراير 2025',
                    'date_en' => 'February 2025',
                    'funded_ar' => 'منظمة ماما أفريقيا للخدمات الإنسانية',
                    'funded_en' => 'MAMA Africa Organization for Humanitarian Services',
                    'amount' => '1,000 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                    'icon' => 'fas fa-hand-holding-usd'
                ],
                [
                    'title_ar' => 'تعزيز الأمن الغذائي عبر المطابخ المشتركة بالفاشر',
                    'title_en' => 'Reinforce Food Security through Communal Kitchen',
                    'desc_ar' => 'تعزيز الأمن الغذائي للنازحين بمراكز الإيواء بالفاشر من خلال تشغيل ودعم المطابخ المشتركة.',
                    'desc_en' => 'Reinforce Food Security through communal kitchen at El Fasher shelters.',
                    'detail_ar' => 'بتمويل من وزارة الشؤون الاجتماعية بقيمة 2,000 دولار.',
                    'detail_en' => 'Funded by Ministry of social affairs with amount of 2,000 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher Shelter center, North Darfur, Sudan',
                    'date_ar' => 'مايو – يونيو 2025',
                    'date_en' => 'May – June 2025',
                    'funded_ar' => 'وزارة الشؤون الاجتماعية',
                    'funded_en' => 'Ministry of Social Affairs',
                    'amount' => '2,000 USD',
                    'status_ar' => 'مستمر',
                    'status_en' => 'Ongoing',
                    'icon' => 'fas fa-utensils'
                ]
            ];

            foreach ($foodActivities as $item) {
                $act = new ProjectActivity();
                $act->project_id = 39;
                $act->setTranslation('title', 'ar', $item['title_ar']);
                $act->setTranslation('title', 'en', $item['title_en']);
                $act->setTranslation('description', 'ar', $item['desc_ar']);
                $act->setTranslation('description', 'en', $item['desc_en']);
                $act->setTranslation('detail', 'ar', $item['detail_ar']);
                $act->setTranslation('detail', 'en', $item['detail_en']);
                $act->setTranslation('location', 'ar', $item['location_ar']);
                $act->setTranslation('location', 'en', $item['location_en']);
                $act->setTranslation('date', 'ar', $item['date_ar']);
                $act->setTranslation('date', 'en', $item['date_en']);
                $act->setTranslation('funded_by', 'ar', $item['funded_ar']);
                $act->setTranslation('funded_by', 'en', $item['funded_en']);
                $act->amount = $item['amount'];
                $act->setTranslation('status', 'ar', $item['status_ar']);
                $act->setTranslation('status', 'en', $item['status_en']);
                $act->icon = $item['icon'];
                $act->save();
            }
        }

        // 5. Education (ID: 40)
        $education = Projects::find(40);
        if ($education) {
            $eduActivities = [
                [
                    'title_ar' => 'إعادة تأهيل وصيانة المدارس',
                    'title_en' => 'School Rehabilitation & Renovation',
                    'desc_ar' => 'صيانة الفصول الدراسية المتضررة وبناء مرافق صحية للطلاب والطالبات.',
                    'desc_en' => 'Renovating damaged classrooms and building sanitation facilities for students.',
                    'detail_ar' => 'ترميم البنية التحتية التعليمية في المناطق المتضررة من النزاعات.',
                    'detail_en' => 'Restoring educational infrastructure in conflict-affected zones.',
                    'location_ar' => 'مدارس الفاشر',
                    'location_en' => 'El Fasher Schools',
                    'date_ar' => 'يناير – مايو 2025',
                    'date_en' => 'Jan – May 2025',
                    'funded_ar' => 'اليونيسف والطب الشمولي',
                    'funded_en' => 'UNICEF & Holistic Medicine',
                    'amount' => '14,000 USD',
                    'status_ar' => 'مستمر',
                    'status_en' => 'Ongoing',
                    'icon' => 'fas fa-school'
                ],
                [
                    'title_ar' => 'توزيع المستلزمات والحقائب المدرسية',
                    'title_en' => 'Educational Supplies Distribution',
                    'desc_ar' => 'توفير الحقائب المدرسية والكتب والقرطاسية والوسائل التعليمية للأطفال النازحين.',
                    'desc_en' => 'Providing school bags, books, stationery, and learning aids to displaced children.',
                    'detail_ar' => 'تجهيز الأطفال المحرومين بالحقائب والأدوات التعليمية اللازمة.',
                    'detail_en' => 'Equipping underprivileged children with necessary educational tools.',
                    'location_ar' => 'مراكز إيواء النازحين',
                    'location_en' => 'Displacement Centers',
                    'date_ar' => 'سبتمبر 2024',
                    'date_en' => 'Sep 2024',
                    'funded_ar' => 'رعاية الطفولة',
                    'funded_en' => 'Save the Children',
                    'amount' => '5,800 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                    'icon' => 'fas fa-book-reader'
                ],
                [
                    'title_ar' => 'تدريب المعلمين والتطوير المهني',
                    'title_en' => 'Teacher Training & Professional Development',
                    'desc_ar' => 'تدريب المعلمين المحليين على أساليب التدريس التفاعلية والدعم النفسي للطلاب.',
                    'desc_en' => 'Training local educators on interactive teaching methods and psychosocial support for kids.',
                    'detail_ar' => 'رفع جودة التعليم وتقديم الرعاية الداعمة للنفسية داخل الفصول.',
                    'detail_en' => 'Enhancing educational quality and classroom trauma-informed care.',
                    'location_ar' => 'المقر الإقليمي',
                    'location_en' => 'Regional HQ',
                    'date_ar' => 'أكتوبر – ديسمبر 2024',
                    'date_en' => 'Oct – Dec 2024',
                    'funded_ar' => 'اليونسكو',
                    'funded_en' => 'UNESCO',
                    'amount' => '3,200 USD',
                    'status_ar' => 'مستمر',
                    'status_en' => 'Ongoing',
                    'icon' => 'fas fa-chalkboard-teacher'
                ]
            ];

            foreach ($eduActivities as $item) {
                $act = new ProjectActivity();
                $act->project_id = 40;
                $act->setTranslation('title', 'ar', $item['title_ar']);
                $act->setTranslation('title', 'en', $item['title_en']);
                $act->setTranslation('description', 'ar', $item['desc_ar']);
                $act->setTranslation('description', 'en', $item['desc_en']);
                $act->setTranslation('detail', 'ar', $item['detail_ar']);
                $act->setTranslation('detail', 'en', $item['detail_en']);
                $act->setTranslation('location', 'ar', $item['location_ar']);
                $act->setTranslation('location', 'en', $item['location_en']);
                $act->setTranslation('date', 'ar', $item['date_ar']);
                $act->setTranslation('date', 'en', $item['date_en']);
                $act->setTranslation('funded_by', 'ar', $item['funded_ar']);
                $act->setTranslation('funded_by', 'en', $item['funded_en']);
                $act->amount = $item['amount'];
                $act->setTranslation('status', 'ar', $item['status_ar']);
                $act->setTranslation('status', 'en', $item['status_en']);
                $act->icon = $item['icon'];
                $act->save();
            }
        }

        // 6. Peace Building (ID: 43)
        $peace = Projects::find(43);
        if ($peace) {
            $peaceActivities = [
                [
                    'title_ar' => 'بناء السلام والتعايش السلمي عبر التدريب بالفاشر',
                    'title_en' => 'Peacebuilding through Community Training',
                    'desc_ar' => 'تيسير دورات تدريبية لبناء السلام وحل النزاعات في مخيمات النازحين ومراكز الإيواء وريف الفاشر.',
                    'desc_en' => 'Conducted peacebuilding through training at IDPs camps, shelter center, and El Fasher rural area.',
                    'detail_ar' => 'بتمويل من منظمة جبل سسي للسلام والتنمية بقيمة إجمالية بلغت 500 دولار.',
                    'detail_en' => 'Funded by Jabal Sesae organization for peace and development with total of 500 USD.',
                    'location_ar' => 'مخيمات النازحين وريف الفاشر ومراكز الإيواء، السودان',
                    'location_en' => 'IDPs camps, shelter center, and El Fasher rural area, Sudan',
                    'date_ar' => 'مارس 2024',
                    'date_en' => 'March 2024',
                    'funded_ar' => 'منظمة جبل سسي للسلام والتنمية',
                    'funded_en' => 'Jabal Sesae Organization for Peace and Development',
                    'amount' => '500 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'مبادرة بناء السلام وتمكين النساء والفتيات بمراكز الإيواء',
                    'title_en' => 'Peacebuilding Promotion Initiative for Women & Girls',
                    'desc_ar' => 'إطلاق مبادرة بناء السلام وتدريب النساء والفتيات على حل النزاعات والوساطة بمراكز إيواء الفاشر.',
                    'desc_en' => 'Conducted peacebuilding promotion initiative training of women and girls in shelter centers.',
                    'detail_ar' => 'بدعم من منظمة بركتيكال أكشن بمبلغ 500 دولار.',
                    'detail_en' => 'Supported by Practical Action with amount of 500 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                    'date_ar' => 'أبريل 2024',
                    'date_en' => 'April 2024',
                    'funded_ar' => 'منظمة بركتيكال أكشن (عمل عملي)',
                    'funded_en' => 'Practical Action',
                    'amount' => '500 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'تدريب متطوعي بناء السلام حول مدونة السلوك',
                    'title_en' => 'Peacebuilding Training for Volunteers (Code of Conduct)',
                    'desc_ar' => 'تدريب متطوعي بناء السلام وتأهيلهم حول مدونات السلوك وأسس العمل الإنساني والتعايش بمراكز إيواء الفاشر.',
                    'desc_en' => 'Conducted peacebuilding training for volunteers on the humanitarian code of conduct.',
                    'detail_ar' => 'بدعم من منظمة الساحل السوداني بمبلغ إجمالي قدره 500 دولار.',
                    'detail_en' => 'Supported by Sahil Sudani organization with total of 500 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                    'date_ar' => '2024',
                    'date_en' => '2024',
                    'funded_ar' => 'منظمة الساحل السوداني',
                    'funded_en' => 'Sahil Sudani Organization',
                    'amount' => '500 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ],
                [
                    'title_ar' => 'تعزيز بناء السلام عبر الأنشطة الثقافية والاجتماعية بالفاشر',
                    'title_en' => 'Promoting Peacebuilding through Culture & Social Activities',
                    'desc_ar' => 'تعزيز التعايش السلمي والتماسك الاجتماعي من خلال تنظيم فعاليات ثقافية وأنشطة اجتماعية بمراكز الإيواء بالفاشر.',
                    'desc_en' => 'Promoted peacebuilding and social cohesion through cultural events and social activities.',
                    'detail_ar' => 'بدعم من مركز نجوم المستقبل بقيمة إجمالية بلغت 900 دولار.',
                    'detail_en' => 'Supported by Future Stars Center with total amount of 900 USD.',
                    'location_ar' => 'مركز الإيواء بالفاشر، شمال دارفور، السودان',
                    'location_en' => 'El Fasher shelter center, North Darfur, Sudan',
                    'date_ar' => '2024',
                    'date_en' => '2024',
                    'funded_ar' => 'مركز نجوم المستقبل (Future Stars)',
                    'funded_en' => 'Future Stars Center',
                    'amount' => '900 USD',
                    'status_ar' => 'مكتمل',
                    'status_en' => 'Completed',
                ]
            ];

            foreach ($peaceActivities as $item) {
                $act = new ProjectActivity();
                $act->project_id = 43;
                $act->setTranslation('title', 'ar', $item['title_ar']);
                $act->setTranslation('title', 'en', $item['title_en']);
                $act->setTranslation('description', 'ar', $item['desc_ar']);
                $act->setTranslation('description', 'en', $item['desc_en']);
                $act->setTranslation('detail', 'ar', $item['detail_ar']);
                $act->setTranslation('detail', 'en', $item['detail_en']);
                $act->setTranslation('location', 'ar', $item['location_ar']);
                $act->setTranslation('location', 'en', $item['location_en']);
                $act->setTranslation('date', 'ar', $item['date_ar']);
                $act->setTranslation('date', 'en', $item['date_en']);
                $act->setTranslation('funded_by', 'ar', $item['funded_ar']);
                $act->setTranslation('funded_by', 'en', $item['funded_en']);
                $act->amount = $item['amount'];
                $act->setTranslation('status', 'ar', $item['status_ar']);
                $act->setTranslation('status', 'en', $item['status_en']);
                $act->icon = 'fas fa-dove';
                $act->save();
            }
        }
    }
}
