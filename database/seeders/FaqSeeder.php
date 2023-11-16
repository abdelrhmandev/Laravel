<?php
namespace Database\Seeders;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->delete();
        DB::table('faq_translations')->delete();

        //1
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What is budget management?', 'answer' => 'Budget management is an element within business in which a person or department tracks, evaluates and forecasts financial positioning and fund allotment', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هي إدارة الميزانية؟', 'answer' => 'تشير إدارة الميزانية إلى عملية الإشراف على الخطط والقيود المالية وتتبعها خلال فترة معينة لإدارة الإنفاق والتحكم فيه بشكل فعال.J', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);

        //2
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'How do you prioritize tasks in a project?', 'answer' => 'Let\'s take a look at some of the tips on how to effectively prioritize project tasks at work', 'lang' => 'en', 'faq_id' => $id], ['question' => 'كيف يمكنك تحديد أولويات المهام في المشروع؟', 'answer' => 'أنشئ قائمة واحدة تتضمّن كافة المهام', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);

        //3
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What was your most successful project?', 'answer' => 'While some projects are more successful than others', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هو مشروعك الأكثر نجاحا؟', 'answer' => 'أفكار مشاريع تجارية: إنشاء مشروع إعداد وجبات منزلية وصحية', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);

        //4
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What is your experience with budget management?', 'answer' => 'Budget management is crucial for supporting the financial health of an organization', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هي تجربتك مع إدارة الميزانية؟', 'answer' => 'لذلك هذه الورقة ستعرض أربع تجارب دولية مختلفة لإدارة الميزانية الإستراتيجية', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);

        //5
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What tools do you use to plan a project?', 'answer' => 'You can use tools such as Gantt charts, network diagrams, or software applications to develop a project plan for your project', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هي الأدوات التي تستخدمها لتخطيط المشروع؟', 'answer' => 'تساعد مخططات جانت في تتبع الجدول الزمني للمشروع، والتحقق من أي انحرافات عن خطة المشروع وتحديد التأخيرات. يمكن للشركات البقاء على المسار الصحيح ', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);

        //6
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'How long do I have to wait to get an answer from support?', 'answer' => 'If you already created a case using email option means wait for few hours', 'lang' => 'en', 'faq_id' => $id], ['question' => 'كم من الوقت يجب أن أنتظر للحصول على إجابة من الدعم؟', 'answer' => 'قبل التواصل مع Google للحصول على مساعدة بشأن حسابك على Google Workspace أو Cloud Identity', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);
        //7
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'How do I cancel/modify an order?', 'answer' => 'This might seem like something that you want to deter, but it’s bound to happen in every business', 'lang' => 'en', 'faq_id' => $id], ['question' => 'كيف يمكنني إلغاء/تعديل الطلب؟', 'answer' => 'اذهب إلى طلباتك وحدِّد الطلب الذي تريد إلغاءه', 'lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);
        //8
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'How long does order processing take?', 'answer' => 'Bear in mind this is different than shipping time', 'lang' => 'en', 'faq_id' => $id], ['question' => 'كم من الوقت تستغرق معالجة الطلب؟', 'answer' => 'يتم معالجة طلب السحب خلال 3 إلى 4 أيام عمل. قد يستغرق وصول أموال العميل إلى حسابه البنكي عدة أيام أخرى بعد تنفيذ طلب الحسب','lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);
        //9
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What is your return/exchange policy?', 'answer' => 'Another pressing question that every retail brand is tired of answering', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هي سياسة الإرجاع/الاستبدال الخاصة بك؟', 'answer' => 'لا يُسمح باستبدال أو إرجاع المنتجات دون الغلاف و/أو الختم الأصلي كاملًا','lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);
        //10
        $id = DB::table('faqs')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['question' => 'What countries do you ship to?', 'answer' => 'Too often, people take it for granted that websites and E-Commerce stores will ship to them. After all', 'lang' => 'en', 'faq_id' => $id], ['question' => 'ما هي الدول التي تقوم بالشحن إليها؟', 'answer' => 'نقوم حالياً بالشحن داخل الإمارات العربية المتحدة والمملكة العربية السعودية وجمهورية مصر العربية.','lang' => 'ar', 'faq_id' => $id]];
        DB::table('faq_translations')->insert($translated_items);


    }
}
