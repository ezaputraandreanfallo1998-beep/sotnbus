<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateExistingUsersSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            if (empty($user->username)) {
                $username = strtolower(str_replace(' ', '', $user->name));
                $user->username = $username;
                $user->save();
            }
        }
    }
}