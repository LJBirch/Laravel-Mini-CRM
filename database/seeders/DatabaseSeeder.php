<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Lewis',
//             'email' => 'admin@admin.com',
//             'password' => bcrypt('password')
//         ]);

        \App\Models\User::factory()->create([
            'name' => 'Lewis',
            'email' => 'lewisjaybirch@gmail.com',
            'password' => bcrypt('password')
        ]);

         $companies = Company::factory(30)->create();

         foreach ($companies as $company) {
             Employee::factory(10)->create([
                 'company_id' => $company->id
             ]);
         }
    }
}
