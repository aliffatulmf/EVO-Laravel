<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\Role;

class RoleFactory extends Factory
{
    protected $model = Role::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Administrator',
            'is_admin' => true,
            'default_point' => 100
        ];
    }
}
