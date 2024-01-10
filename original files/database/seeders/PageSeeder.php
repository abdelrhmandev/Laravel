<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        DB::table('page_translations')->delete();

        $items = [
            ['status' => '1', 'image' => 'uploads/pages/1.jpg'], 
            ['status' => '1', 'image' => 'uploads/pages/2.png'], 
            ['status' => '0', 'image' => 'uploads/pages/3.jpg'], 
            ['status' => '1', 'image' => 'uploads/pages/4.jpg'], 
            ['status' => '0', 'image' => 'uploads/pages/5.jpg'], 
            ['status' => '0', 'image' => NULL],
            ['status' => '1', 'image' => NULL],
            ];
        DB::table('pages')->insert($items);

        $translated_items = [
            ['title' => 'About Us', 'slug' => 'about-us', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '1'],
            ['title' => 'نبذه عن الشركه', 'slug' => 'نبذه-عن-الشركه', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '1'],

            ['title' => 'Services', 'slug' => 'services', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '2'],
            ['title' => 'الخدمات', 'slug' => 'الخدمات', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '2'],

            ['title' => 'Contact Us', 'slug' => 'contact-us', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '3'],
            ['title' => 'أتصل بنا', 'slug' => 'أتصل-بنا', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '3'],

            ['title' => 'Blog', 'slug' => 'blog', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '4'],
            ['title' => 'المدونه ', 'slug' => 'المدونه ', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '4'],

            ['title' => 'Clients', 'slug' => 'clients', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '5'],
            ['title' => 'العملاء', 'slug' => 'العملاء', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '5'],

            ['title' => 'Products', 'slug' => 'products', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '6'],
            ['title' => 'المنتجات', 'slug' => 'المنتجات', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '6'],

            ['title' => 'FAQs', 'slug' => 'faqs', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget.', 'lang' => 'en', 'page_id' => '7'],
            ['title' => 'سؤال و جواب', 'slug' => 'سؤال-و-جواب', 'description' => ' ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف','lang' => 'ar', 'page_id' => '7'],
        ];
        DB::table('page_translations')->insert($translated_items);
    }
}
