<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Activity::truncate();
        
        $activites = [[
            "id"=> \Illuminate\Support\Str::uuid(),
            "name" => "Study",
            "type" => "Routine",
            "description" => "Study",
            "status"=> 1,
            "time_start" => "08:00",
            "time_end"=> "11:00",
        ],[
            "id"=> \Illuminate\Support\Str::uuid(),
            "name" => "Sleep",
            "type"=> "Routine",
            "description"=> "Sleep",
            "status"=> 0,
            "time_start" => "08:00",
            "time_end"=> "11:00",
        ]];

        foreach ($activites as $activity) {
            Activity::create($activity);
        }

    }
}
