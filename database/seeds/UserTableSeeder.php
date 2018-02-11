<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = Role::where('name', 'admin')->first();
    $role_author= Role::where('name', 'author')->first();
    $role_editor= Role::where('name', 'editor')->first();
    
    $admin = new User();
    $admin->name = 'Admin Name';
    $admin->email = 'admin@example.com';
    $admin->password = bcrypt('secret');
    $admin->save();
    $admin->roles()->attach($role_admin);
    
    $author = new User();
    $author->name = 'Author Name';
    $author->email = 'author@example.com';
    $author->password = bcrypt('secret');
    $author->save();
    $author->roles()->attach($role_author);

    $editor = new User();
    $editor->name = 'Editor Name';
    $editor->email = 'editor@example.com';
    $editor->password = bcrypt('secret');
    $editor->save();
    $editor->roles()->attach($role_editor);
  }
}