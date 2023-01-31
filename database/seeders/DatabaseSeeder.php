<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
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
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            // CountrySeeder::class,
            // CitySeeder::class,
            // AreaSeeder::class,
            // DistrictSeeder::class,
            // SlideSeeder::class,   
            // TagSeeder::class,
            // PageSeeder::class,
            // ProductCategorySeeder::class,
            // ProductSeeder::class,
            // ProductReviewSeeder::class,  
            // PostCategorySeeder::class,
            // PostSeeder::class,
            // PostCommentSeeder::class,  
            // FaqSeeder::class,
            // ClientSeeder::class,
            // BannerSeeder::class,
            // RecipeCategorySeeder::class,
            // RecipeSeeder::class,
            // RecipeReviewSeeder::class,
            // RecipeTagSeeder::class,
            // RecipelikeSeeder::class,
            // BrandSeeder::class,
            // CopounSeeder::class,
            // SettingSeeder::class,
            // NutritionSeeder::class,
            // RecipeNutritionSeeder::class,
        ]); 
    }
}
