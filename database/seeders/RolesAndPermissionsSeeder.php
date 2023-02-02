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



        Permission::create(['name' => 'roles-list','display' => '{"ar" : "عرض الرتب", "en" : "List Roles"}']);
        Permission::create(['name' => 'roles-delete','display' => '{"ar" : "حذف الرتب", "en" : "Delete Roles"}']);
        Permission::create(['name' => 'roles-create','display' => '{"ar" : "أنشاء الرتب", "en" : "Create Roles"}']);
        Permission::create(['name' => 'roles-edit','display' => '{"ar" : "تحرير الرتب", "en" : "Edit Roles"}']);


        Permission::create(['name' => 'permissions-list','display' => '{"ar" : "عرض الصلاحيات", "en" : "List Permissions"}']);
        Permission::create(['name' => 'permissions-delete','display' => '{"ar" : "حذف الصلاحيات", "en" : "Delete Permissions"}']);
        Permission::create(['name' => 'permissions-create','display' => '{"ar" : "أنشاء الصلاحيات", "en" : "Create Permissions"}']);
        Permission::create(['name' => 'permissions-edit','display' => '{"ar" : "تحرير الصلاحيات", "en" : "Edit Permissions"}']);

        
        Permission::create(['name' => 'clients-list','display' => '{"ar" : "عرض العملاء", "en" : "List Clients"}']);
        Permission::create(['name' => 'clients-delete','display' => '{"ar" : "حذف العملاء", "en" : "Delete Clients"}']);
        Permission::create(['name' => 'clients-create','display' => '{"ar" : "أنشاء العملاء", "en" : "Create Clients"}']);
        Permission::create(['name' => 'clients-edit','display' => '{"ar" : "تحرير العملاء", "en" : "Edit Clients"}']);


        Permission::create(['name' => 'menus-list','display' => '{"ar" : "عرض القوائم", "en" : "List Menus"}']);
        Permission::create(['name' => 'menus-delete','display' => '{"ar" : "حذف القوائم", "en" : "Delete Menus"}']);
        Permission::create(['name' => 'menus-create','display' => '{"ar" : "أنشاء القوائم", "en" : "Create Menus"}']);
        Permission::create(['name' => 'menus-edit','display' => '{"ar" : "تحرير القوائم", "en" : "Edit Menus"}']);


        
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