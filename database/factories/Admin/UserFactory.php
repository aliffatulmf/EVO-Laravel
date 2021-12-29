<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin\User;

class UserFactory extends Factory
{
    protected $model = User::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ];
    }
}
