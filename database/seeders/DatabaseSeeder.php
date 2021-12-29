<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use App\Models\Admin\Candidate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create();
        User::factory()->create();
        Candidate::factory(2)->create();
    }
}
