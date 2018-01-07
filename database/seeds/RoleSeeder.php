<?php

use Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Administrator',
        ]);

        $author = Role::create([
            'name' => 'Author',
        ]);

        $subscriber = Role::create([
            'name' => 'Subscriber',
        ]);
    }
}
