<?php

namespace Database\Seeders;

use App\Models\Technicain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++){
           Technicain::insert([
            'name'=>fake()->name(),
            'city'=>fake()->city(),
            'mobile'=>fake()->phoneNumber(),
            'email'=>fake()->email()
           ]);
        }
    }
}
