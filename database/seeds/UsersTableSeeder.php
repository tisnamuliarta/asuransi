<?php

use Illuminate\Database\Seeder;
use App\User;
use App\AdminNote;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // AdminNote::truncate();

        $faker = Factory::create();
        $name = $faker->name;
        $member_name = $faker->name;
        $password = mt_rand(100000,999999);
        $user = User::create([
            'parent_id' => null,
            'pinCode' => 'GN' .'-'. mt_rand(100000,999999).'-'. str_random(2),
            'name' => $faker->name,
            'sponsorName' => mt_rand(1,2),
            'slug' => str_slug($member_name),
            'address' => $faker->address,
            'phoneNumber' => $faker->phoneNumber,
            'momName' => $faker->firstNameFemale.' '.$faker->lastName,
            'ahliwaris' => $faker->name,
            'bank_id' => mt_rand(1,20),
            'bankNumber' => $faker->bankAccountNumber,
            'email' => $faker->freeEmail,
            'password' => bcrypt($password)
        ]);

        AdminNote::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'pinCode' => $user->pinCode,
            'password' => $password
        ]);

        foreach (range(1, 27) as $i) {
            $member_name = $faker->name;
            $password = mt_rand(100000,999999);
        	$user = User::create([
        		'parent_id' => mt_rand(1,9),
        		'pinCode' => 'GN' .'-'. mt_rand(100000,999999).'-'. str_random(2),
                'sponsorName' => mt_rand(1,2),
                'name' => $member_name,
                'slug' => str_slug($member_name),
                'address' => $faker->address,
                'phoneNumber' => $faker->phoneNumber,
                'momName' => $faker->firstNameFemale.' '.$faker->lastName,
                'ahliwaris' => $faker->name,
                'bank_id' => mt_rand(1,20),
                'bankNumber' => $faker->bankAccountNumber,
                'email' => $faker->freeEmail,
                'password' => bcrypt($password)
        	]);

            AdminNote::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'pinCode' => $user->pinCode,
                'password' => $password
            ]);


        }
    }
}
