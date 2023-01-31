<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        


        Permission::create(['name' => 'posts-list','display' => '{"ar" : "عرض المقالات", "en" : "List Posts"}']);
        Permission::create(['name' => 'posts-delete','display' => '{"ar" : "حذف المقالات", "en" : "Delete Posts"}']);
        Permission::create(['name' => 'posts-create','display' => '{"ar" : "أنشاء المقالات", "en" : "Create Posts"}']);
        Permission::create(['name' => 'posts-edit','display' => '{"ar" : "تحرير المقالات", "en" : "Edit Posts"}']);

        
        Permission::create(['name' => 'posts-publish','display' => '{"ar" : "نشر المقالات", "en" : "Publish Posts"}']);
        Permission::create(['name' => 'posts-unpublish','display' => '{"ar" : "إلغاء نشر المقالات", "en" : "Unpublish Posts"}']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'super-admin','display' => '{"ar" : "المدير العام", "en" : "SuperAdmin"}']);
        $role->givePermissionTo(Permission::all());

        // // this can be done as separate statements
        $role = Role::create(['name' => 'writer','display'=>'{"ar" : "كاتب محتوي", "en" : "Writer"}']);
        $role = Role::create(['name' => 'editor','display'=>'{"ar" : "محرر", "en" : "Editor"}']);
  
        $role = Role::create(['name' => 'support','display'=>'{"ar" : "دعم فني", "en" : "Support"}']);
        $role = Role::create(['name' => 'analyst','display'=>'{"ar" : "محلل", "en" : "Analyst"}']);

        
        
        
        $role->givePermissionTo('posts-list');

        // // or may be done by chaining

        $role = Role::create(['name' => 'moderator','display'=>'{"ar" : "رئيس جلسة", "en" : "Moderator"}'])
            ->givePermissionTo(['posts-publish']);


    }
}