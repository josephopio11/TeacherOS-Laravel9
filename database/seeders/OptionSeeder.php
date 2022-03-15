<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::insert([
            'mark' => 1,
            'description' => "Below Average"
        ]);
        Option::insert([
            'mark' => 2,
            'description' => "Satisfactory"
        ]);
        Option::insert([
            'mark' => 3,
            'description' => "Good"
        ]);
        Option::insert([
            'mark' => 4,
            'description' => "Very Good"
        ]);
        Option::insert([
            'mark' => 5,
            'description' => "Excellent"
        ]);
    }
}
