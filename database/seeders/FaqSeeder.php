<?php
namespace Database\Seeders;
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


       $items = [
        [],
        [],
        [],
        [],
        [],];
       DB::table('faqs')->insert($items);      

       $translated_items = [


            ['question'=>'Can you tell us about the last project you worked on','answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','lang'=>'en','faq_id'=>'1'],
            ['question'=>'هل يمكنك إخبارنا عن آخر مشروع عملت عليه','answer'=>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ','lang'=>'ar','faq_id'=>'1'],


            ['question'=>'How do you prioritize tasks in a project','answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','lang'=>'en','faq_id'=>'2'],
            ['question'=>'كيف تحدد أولويات المهام في المشروع','answer'=>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ','lang'=>'ar','faq_id'=>'2'],

            ['question'=>'What was your most successful project','answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','lang'=>'en','faq_id'=>'3'],
            ['question'=>'ما هو أنجح مشروع لك','answer'=>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ','lang'=>'ar','faq_id'=>'3'],      


            ['question'=>'What is your experience with budget management','answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','lang'=>'en','faq_id'=>'4'],
            ['question'=>'ما هي تجربتك مع إدارة الميزانية','answer'=>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ','lang'=>'ar','faq_id'=>'4'],      


            ['question'=>'What tools do you use to plan a project','answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','lang'=>'en','faq_id'=>'5'],
            ['question'=>'ما هي الأدوات التي تستخدمها لتخطيط مشروع','answer'=>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ','lang'=>'ar','faq_id'=>'5'],

       ];
       DB::table('faq_translations')->insert($translated_items);  

    }
}
