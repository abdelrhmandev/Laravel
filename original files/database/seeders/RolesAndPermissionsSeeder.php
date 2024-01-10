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



        Permission::create(['name' => 'pages-list','trans' => '[{"ar" : "عرض الصفحات", "en" : "List Pages"}]']);
        Permission::create(['name' => 'pages-delete','trans' => '[{"ar" : "حذف الصفحات", "en" : "Delete Pages"}]']);
        Permission::create(['name' => 'pages-create','trans' => '[{"ar" : "أنشاء الصفحات", "en" : "Create Pages"}]']);
        Permission::create(['name' => 'pages-edit','trans' => '[{"ar" : "تحرير الصفحات", "en" : "Edit Pages"}]']);



        Permission::create(['name' => 'tags-list','trans' => '[{"ar" : "عرض الوسوم", "en" : "List Tags"}]']);
        Permission::create(['name' => 'tags-delete','trans' => '[{"ar" : "حذف الوسوم", "en" : "Delete Tags"}]']);
        Permission::create(['name' => 'tags-create','trans' => '[{"ar" : "أنشاء الوسوم", "en" : "Create Tags"}]']);
        Permission::create(['name' => 'tags-edit','trans' => '[{"ar" : "تحرير الوسوم", "en" : "Edit Tags"}]']);



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


        Permission::create(['name' => 'vacancies-list','trans' => '[{"ar" : "عرض الوظائف", "en" : "List Vacancies"}]']);
        Permission::create(['name' => 'vacancies-delete','trans' => '[{"ar" : "حذف الوظائف", "en" : "Delete Vacancies"}]']);
        Permission::create(['name' => 'vacancies-create','trans' => '[{"ar" : "أنشاء الوظائف", "en" : "Create Vacancies"}]']);
        Permission::create(['name' => 'vacancies-edit','trans' => '[{"ar" : "تحرير الوظائف", "en" : "Edit Vacancies"}]']);        
        Permission::create(['name' => 'applicants-list','trans' => '[{"ar" : "عرض المتقدمين للوظائف", "en" : "List Applicants"}]']);




        Permission::create(['name' => 'comments-list','trans' => '[{"ar" : "عرض التعليقات", "en" : "List Comments"}]']);
        Permission::create(['name' => 'comments-delete','trans' => '[{"ar" : "حذف التعليقات", "en" : "Delete Comments"}]']);
        Permission::create(['name' => 'comments-edit','trans' => '[{"ar" : "تحرير التعليقات", "en" : "Edit Comments"}]']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'super-admin','trans' => '[{"ar" : "المدير العام", "en" : "SuperAdmin"}]']);
        $role->givePermissionTo(Permission::all());

        // // this can be done as separate statements

        $role = Role::create(['name' => 'hr','trans'=>'[{"ar" : "موارد بشريه", "en" : "HR"}]']);
        $role->givePermissionTo('vacancies-list')
        ->givePermissionTo(['vacancies-delete'])
        ->givePermissionTo(['vacancies-create'])
        ->givePermissionTo(['vacancies-edit'])
        ->givePermissionTo(['applicants-list'])
        ;


        $role = Role::create(['name' => 'writer','trans'=>'[{"ar" : "كاتب محتوي", "en" : "Writer"}]']);
        $role->givePermissionTo('posts-create')
        ->givePermissionTo(['clients-create']);


        $role = Role::create(['name' => 'editor','trans'=>'[{"ar" : "محرر", "en" : "Editor"}]']);
        $role->givePermissionTo('posts-list')
        ->givePermissionTo(['tags-list'])
        ->givePermissionTo(['tags-edit']);


  
        $role = Role::create(['name' => 'support','trans'=>'[{"ar" : "دعم فني", "en" : "Support"}]']);
        $role->givePermissionTo('pages-list')
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
        ->givePermissionTo(['comments-list'])
        ->givePermissionTo(['comments-edit'])
        ->givePermissionTo(['comments-delete']);
            


    }
}