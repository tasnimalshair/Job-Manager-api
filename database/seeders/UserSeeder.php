<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $users = [
            [
                'name' => 'Tasnim Alshair',
                'email' => 'tasnim@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => '12345678',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@gmail.com',
                'password' => '12345678',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
