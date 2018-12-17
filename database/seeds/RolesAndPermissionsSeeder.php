<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        $editArticles = Permission::create(['name' => 'edit articles']);
        $deleteArticles = Permission::create(['name' => 'delete articles']);
        $publishArticles = Permission::create(['name' => 'publish articles']);
        $unpublishArticles = Permission::create(['name' => 'unpublish articles']);
        $createUsers = Permission::create(['name' => 'create users']);
        $editUsers = Permission::create(['name' => 'edit users']);
        $deleteUsers = Permission::create(['name' => 'delete users']);
        $viewUsers = Permission::create(['name' => 'view users']);
        $postComments = Permission::create(['name' => 'post comments']);
        $editComments = Permission::create(['name' => 'edit comments']);
        $deleteComments = Permission::create(['name' => 'delete comments']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $author = Role::create(['name' => 'author']);
        $user = Role::create(['name' => 'user']);

        $admin->givePermissionTo(Permission::all());
        $moderator->givePermissionTo([$editArticles, $deleteArticles, $publishArticles, $unpublishArticles, $postComments, $editComments, $deleteComments]);
        $author->givePermissionTo($publishArticles, $unpublishArticles, $editArticles, $deleteArticles, $deleteComments, $postComments, $editComments, $deleteComments);
        $user->givePermissionTo($postComments, $editComments, $deleteComments);

    }
}
