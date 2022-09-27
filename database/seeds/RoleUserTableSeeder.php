<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $roles = Role::all();
        $users = User::all();

        foreach($users as $user){

            if ($user->id === 1){
                $user->roles()->sync([1]);
            } else{
                // modo 1 $randomRole = Role::inRandomOrder()->first();

                // modo 2 $randomRoleIds = [$faker ->randomElement($roles)->id, $faker ->randomElement($roles)->id];
                // $user->roles()->sync($randomRoleIds);

                //modo 3
                $randomRoles = $faker->randomElements($roles, 2, false);

                foreach ($randomRoles as $randomRole){
                    $user->roles()->attach($randomRole->id);
                }
            }

        }
    }
}
