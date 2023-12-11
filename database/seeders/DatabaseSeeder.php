<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Support\Facades\Storage;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


     


        $this->call([

            /* Start User Management SEEDER */
            RolesAndPermissionsSeeder::class,

            UserSeeder::class,
            /* Start User Management SEEDER */


            /* CMS SEEDER */            
            // CategorySeeder::class,
            PostSeeder::class,
            // PostMedia::class,
            // PostCategorySeeder::class,
            // TagSeeder::class,
            // PostTagSeeder::class,
            // CommentSeeder::class,  
            // PageSeeder::class,
            // /* CMS SEEDER */


            // Start Miscellaneous SEEDER

            // CountrySeeder::class,
            // CitySeeder::class,
            // AreaSeeder::class,
            // DistrictSeeder::class,
            // SliderSeeder::class,   
            // FaqSeeder::class,
            // ClientSeeder::class,
            // VacancySeeder::class,
            // ApplicantSeeder::class,
            // ContactSeeder::class,

            // SettingSeeder::class,

            // End Miscellaneous SEEDER



            // Start E-commerce SEEDER
            // ProductCategorySeeder::class,
            // ProductSeeder::class,
            // ProductReviewSeeder::class,  
            // BannerSeeder::class,
            // BrandSeeder::class,
            // CopounSeeder::class,

            // End E-commerce SEEDER


            // Start Fooding SEEDER

                        // RecipeCategorySeeder::class,
            // RecipeSeeder::class,
            // RecipeReviewSeeder::class,
            // RecipeTagSeeder::class,
            // RecipelikeSeeder::class,
            // NutritionSeeder::class,
            // RecipeNutritionSeeder::class,


            // End Fooding SEEDER





        ]); 
    }
}
