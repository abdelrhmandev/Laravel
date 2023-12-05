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


        Permission::create(['name' => 'users-list','trans' => '[{"ar" : "عرض المستخدمين", "en" : "List Users"}]']);
        Permission::create(['name' => 'users-delete','trans' => '[{"ar" : "حذف المستخدمين", "en" : "Delete Users"}]']);
        Permission::create(['name' => 'users-create','trans' => '[{"ar" : "أنشاء المستخدمين", "en" : "Create Users"}]']);
        Permission::create(['name' => 'users-edit','trans' => '[{"ar" : "تحرير المستخدمين", "en" : "Edit Users"}]']);



        Permission::create(['name' => 'posts-list','trans' => '[{"ar" : "عرض المقالات", "en" : "List Posts"}]']);
        Permission::create(['name' => 'posts-delete','trans' => '[{"ar" : "حذف المقالات", "en" : "Delete Posts"}]']);
        Permission::create(['name' => 'posts-create','trans' => '[{"ar" : "أنشاء المقالات", "en" : "Create Posts"}]']);
        Permission::create(['name' => 'posts-edit','trans' => '[{"ar" : "تحرير المقالات", "en" : "Edit Posts"}]']);

        
        Permission::create(['name' => 'posts-publish','trans' => '[{"ar" : "نشر المقالات", "en" : "Publish Posts"}]']);
        Permission::create(['name' => 'posts-unpublish','trans' => '[{"ar" : "إلغاء نشر المقالات", "en" : "Unpublish Posts"}]']);



        Permission::create(['name' => 'roles-list','trans' => '[{"ar" : "عرض الرتب", "en" : "List Roles"}]']);
        Permission::create(['name' => 'roles-delete','trans' => '[{"ar" : "حذف الرتب", "en" : "Delete Roles"}]']);
        Permission::create(['name' => 'roles-create','trans' => '[{"ar" : "أنشاء الرتب", "en" : "Create Roles"}]']);
        Permission::create(['name' => 'roles-edit','trans' => '[{"ar" : "تحرير الرتب", "en" : "Edit Roles"}]']);


        Permission::create(['name' => 'permissions-list','trans' => '[{"ar" : "عرض الصلاحيات", "en" : "List Permissions"}]']);
        Permission::create(['name' => 'permissions-delete','trans' => '[{"ar" : "حذف الصلاحيات", "en" : "Delete Permissions"}]']);
        Permission::create(['name' => 'permissions-create','trans' => '[{"ar" : "أنشاء الصلاحيات", "en" : "Create Permissions"}]']);
        Permission::create(['name' => 'permissions-edit','trans' => '[{"ar" : "تحرير الصلاحيات", "en" : "Edit Permissions"}]']);

        
        Permission::create(['name' => 'clients-list','trans' => '[{"ar" : "عرض العملاء", "en" : "List Clients"}]']);
        Permission::create(['name' => 'clients-delete','trans' => '[{"ar" : "حذف العملاء", "en" : "Delete Clients"}]']);
        Permission::create(['name' => 'clients-create','trans' => '[{"ar" : "أنشاء العملاء", "en" : "Create Clients"}]']);
        Permission::create(['name' => 'clients-edit','trans' => '[{"ar" : "تحرير العملاء", "en" : "Edit Clients"}]']);


        Permission::create(['name' => 'menus-list','trans' => '[{"ar" : "عرض القوائم", "en" : "List Menus"}]']);
        Permission::create(['name' => 'menus-delete','trans' => '[{"ar" : "حذف القوائم", "en" : "Delete Menus"}]']);
        Permission::create(['name' => 'menus-create','trans' => '[{"ar" : "أنشاء القوائم", "en" : "Create Menus"}]']);
        Permission::create(['name' => 'menus-edit','trans' => '[{"ar" : "تحرير القوائم", "en" : "Edit Menus"}]']);


        
        // create roles and assign created permissions

        $role = Role::create(['name' => 'super-admin','trans' => '[{"ar" : "المدير العام", "en" : "SuperAdmin"}]']);
        $role->givePermissionTo(Permission::all());

        // // this can be done as separate statements
        $role = Role::create(['name' => 'writer','trans'=>'[{"ar" : "كاتب محتوي", "en" : "Writer"}]']);
        $role->givePermissionTo('posts-create')
        ->givePermissionTo(['clients-create']);


        $role = Role::create(['name' => 'editor','trans'=>'[{"ar" : "محرر", "en" : "Editor"}]']);
  
        $role = Role::create(['name' => 'support','trans'=>'[{"ar" : "دعم فني", "en" : "Support"}]']);
        $role->givePermissionTo('users-list')
        ->givePermissionTo(['menus-list'])
        ->givePermissionTo(['menus-edit']);



        $role = Role::create(['name' => 'analyst','trans'=>'[{"ar" : "محلل", "en" : "Analyst"}]']);
        
        $role->givePermissionTo('posts-list')
        ->givePermissionTo(['posts-publish'])
        ->givePermissionTo(['menus-list'])
        ->givePermissionTo(['menus-edit']);

        // // or may be done by chaining

        $role = Role::create(['name' => 'moderator','trans'=>'[{"ar" : "رئيس جلسة", "en" : "Moderator"}]'])
        ->givePermissionTo(['posts-list'])
        ->givePermissionTo(['posts-publish'])
        ->givePermissionTo(['menus-edit'])
        ->givePermissionTo(['menus-create']);
            


    }
}