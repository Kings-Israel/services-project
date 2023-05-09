<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id', '<=', 10)->get();

        foreach ($users as $user) {
            Service::factory(rand(1, 4))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
