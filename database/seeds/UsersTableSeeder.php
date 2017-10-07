<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Insert Administrator.\n";
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'aleutian.xie@cicisoft.cn',
            'password' => '$2y$10$aXGUBbZEryYXiXTT0rLczuyve2ah5aJ6DigrPXTLdOkd2VsZvmoAS',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())]);

        echo "Create Roles.\n";
        echo "Create admin Role.\n";
        Role::Create(['name' => 'admin']);
        echo "Create property Role.\n";
        Role::Create(['name' => 'property']);
        echo "Assign admin Role to Administrator.\n";
        $user = User::where(['name' => 'Administrator'])->get();
        $user->assignRole('admin');
        echo "OK!"
    }
}
