<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = new Role();
    $role_admin->name = 'admin';
    $role_admin->description = 'Admin access.';
    $role_admin->save();

    $role_author = new Role();
    $role_author->name = 'author';
    $role_author->description = 'Author access.';
    $role_author->save();

    $role_editor = new Role();
    $role_editor->name = 'editor';
    $role_editor->description = 'Editor access.';
    $role_editor->save();
  }
  
}
