<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('recipes')->delete();
        DB::table('recipe_translations')->delete();
 
        

        //category_id 1 Snacks
        //category_id 2 Soups
        //category_id 3 Chicken
        //category_id 4 Beef
        //category_id 5 Pasta

       $items = [
        ['image'=>'uploads/recipes/farmers_grilled_cheese.jpg','category_id'=>'1','featured'=>'1','status'=>'published','cook'=>'23','servings'=>'3'], 
        
        ['image'=>'uploads/recipes/blt_pasta.jpg','category_id'=>'2','featured'=>'0','status'=>'published','cook'=>'15','servings'=>'10'],
        
        ['image'=>'uploads/recipes/baked_tilapia_in_lemon_butter_sauce.jpg','category_id'=>'3','featured'=>'1','status'=>'published','cook'=>'22','servings'=>'2'],
        
        ['image'=>'uploads/recipes/spicy-beef-taco-2cd04fc.jpg','category_id'=>'4','featured'=>'1','status'=>'unpublished','cook'=>'45','servings'=>'4'],
        
        ['image'=>'uploads/recipes/healthy-chicken-pasta-bake-8c8fa07.jpg','category_id'=>'3','featured'=>'1','status'=>'unpublished','cook'=>'33','servings'=>'6'],
        
        ['image'=>'uploads/recipes/creamy-mushroom-and-spinach-pasta-9b0582e.jpg','category_id'=>'5','featured'=>'1','status'=>'unpublished','cook'=>'44','servings'=>'7'],

        ['image'=>'uploads/recipes/smoked-brisket-a9a5c4e.jpg','category_id'=>'4','featured'=>'0','status'=>'unpublished','cook'=>'13','servings'=>'5'],

        ['image'=>'uploads/recipes/beef-and-Boston-baked-beans-5678a51.jpg','category_id'=>'4','featured'=>'0','status'=>'published','cook'=>'35','servings'=>'3'],


        ['image'=>'uploads/recipes/pasta-alla-norma.jpg','category_id'=>'5','featured'=>'1','status'=>'unpublished','cook'=>'43','servings'=>'3'],

        

        ['image'=>'uploads/recipes/chicken-mushroom-wellington.jpg','category_id'=>'3','featured'=>'1','status'=>'unpublished','cook'=>'20','servings'=>'3'],

        


    ];
       DB::table('recipes')->insert($items);      

       $translated_items = [

        ['title'=>'Cheese, apple and walnut toastie','slug'=>'cheese-apple-and-walnut-toastie','description'=>'Cheese, apple and walnut toastie Cheese, apple and walnut toastie','lang'=>'en','recipe_id'=>'1'],
        ['title'=>'توست الجبن والتفاح والجوز','slug'=>'جبنة-تفاح-جوز-توست','description'=>'توست الجبن والتفاح والجوز توست الجبن والتفاح والجوز ','lang'=>'ar','recipe_id'=>'1'],

        ['title'=>'BLT Pasta','slug'=>'blt-pasta','description'=>'BLT Pasta','lang'=>'en','recipe_id'=>'2'],
        ['title'=>'BLT باستا','slug'=>'BLT- باستا','description'=>'BLT- باستا ','lang'=>'ar','recipe_id'=>'2'],

        ['title'=>'Baked Tilapia in Lemon Butter Sauce','slug'=>'baked-tilapia-in-lemon-butter-sauce-recipe','description'=>'Baked Tilapia in Lemon Butter Sauce','lang'=>'en','recipe_id'=>'3'],
        ['title'=>'سمك بلطي مطبوخ بصلصة الزبدة والليمون','slug'=>'سمك-بلطي-مطبوخ-بصلصة-الزبدة-والليمون','description'=>'سمك بلطي مطبوخ بصلصة الزبدة والليمون سمك بلطي مطبوخ بصلصة الزبدة والليمون ','lang'=>'ar','recipe_id'=>'3'],

        ['title'=>'Spicy beef taco bowl','slug'=>'spicy-beef-taco-bowl','description'=>'Get all five of your five-a-day in this Mexican-inspired spicy beef taco bowl. Full of textures and flavours, it can be partly prepped ahead','lang'=>'en','recipe_id'=>'4'],
        ['title'=>'صحن تاكو لحم بقري حار','slug'=>'صحن-تاكو-لحم-بقري-حار','description'=>'صحن تاكو لحم بقري حار صحن تاكو لحم بقري حار','lang'=>'ar','recipe_id'=>'4'],
        
        ['title'=>'Healthy chicken pasta bake','slug'=>'healthy-chicken-pasta-bake','description'=>'Try this healthy chicken pasta bake with peppers, courgette and ricotta for a nutritious midweek dinner. It’s sure to be a hit with everyone','lang'=>'en','recipe_id'=>'5'],
        ['title'=>'خبز باستا الدجاج الصحي','slug'=>'خبز-باستا-الدجاج-الصحي','description'=>'جرب معكرونة الدجاج الصحية المخبوزة بالفلفل والكوسة والريكوتا لعشاء منتصف الأسبوع المغذي. من المؤكد أنها ستحقق نجاحًا كبيرًا مع الجميع','lang'=>'ar','recipe_id'=>'5'],


        ['title'=>'Creamy mushroom & spinach pasta','slug'=>'creamy-mushroom-spinach-pasta','description'=>'Toss together tagliatelle, mushrooms and spinach in a parmesan and crème fraîche sauce to make a quick and low calorie dinner that takes just 25 minutes','lang'=>'en','recipe_id'=>'6'],
        ['title'=>'معكرونة بالسبانخ والفطر الكريمي','slug'=>'كريمة-فطر-سبانخ-باستا','description'=>'اخلطي التاغلياتيل والفطر والسبانخ معًا في صلصة البارميزان والكريمة الطازجة لإعداد عشاء سريع ومنخفض السعرات الحرارية يستغرق 25 دقيقة فقط','lang'=>'ar','recipe_id'=>'6'],



        ['title'=>'Smoked brisket','slug'=>'smoked-brisket','description'=>'Fire up the smoker for this flavourful slow-cooked brisket. Serve on a board with charred greens and salsa rossa so everyone can help themselves','lang'=>'en','recipe_id'=>'7'],
        ['title'=>'بريسكيت مدخن','slug'=>'بريسكيت-مدخن','description'=>'أطلق النار على المدخن من أجل هذا لحم الصدر اللذيذ المطبوخ ببطء. تخدم على لوح به خضار متفحمة وصلصة الروسا حتى يتمكن الجميع من مساعدة أنفسهم','lang'=>'ar','recipe_id'=>'7'],




        ['title'=>'Beef & Boston baked beans','slug'=>'beef-boston-baked-beans','description'=>'Enjoy these Boston baked beans with a jacket potato or crusty bread. Time works its magic on this dish, but there’s very little hands-on work to do','lang'=>'en','recipe_id'=>'8'],
        ['title'=>'لحم بقر بالفاصوليا المخبوزة','slug'=>'لحم-بقر-بالفاصوليا-المخبوزة','description'=>'استمتع بهذه الفاصوليا المخبوزة في بوسطن مع سترة البطاطس أو الخبز المقرمش. يعمل الوقت بشكل ساحر على هذا الطبق ، ولكن هناك القليل جدًا من العمل العملي الذي يجب القيام به','lang'=>'ar','recipe_id'=>'8'],




        ['title'=>'Pasta alla norma','slug'=>'pasta-alla-norma','description'=>'Try this easy version of an alla norma, which uses roast aubergine instead of fried. It’s then tossed with spaghetti and a rich tomato and basil sauce','lang'=>'en','recipe_id'=>'9'],
        ['title'=>'باستا ألا نورما','slug'=>'باستا-ألا-نورما','description'=>'جرب هذه النسخة السهلة من آلا نورما ، والتي تستخدم الباذنجان المشوي بدلاً من المقلي. ثم يتم تقليبها مع السباغيتي وصلصة الطماطم الغنية والريحان','lang'=>'ar','recipe_id'=>'9'],



        ['title'=>'Chicken & mushroom wellington','slug'=>'hicken-mushroom-wellington','description'=>'Make a celebration supper for two with this chicken and mushroom wellington. Cut into golden pastry to find a creamy, garlicky inside – perfection','lang'=>'en','recipe_id'=>'10'],
        ['title'=>'دجاج و مشروم ولينغتون','slug'=>'دجاج و مشروم ولينغتون','description'=>'اصنع عشاء احتفالي لشخصين مع هذا الدجاج والفطر ويلينغتون. قطعيها إلى عجينة ذهبية لتحصلي على قوام كريمي بالثوم من الداخل - الكمال','lang'=>'ar','recipe_id'=>'10'],


        
        

       ];
       DB::table('recipe_translations')->insert($translated_items);  

    }
}
