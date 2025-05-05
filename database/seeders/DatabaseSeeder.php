<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobBoard;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=>'jakaria jishan',
            'email'=>'jakaria@jishan.com',
        ]);

        User::factory(20)->create();
        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            JobBoard::factory()->create([
                'employer_id' => $employers->random()
            ]);
        }

        foreach ($users as $user) {
            $jobs = JobBoard::inRandomOrder()->take(rand(0,4))->get();
            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'user_id'=>$user->id,
                    'job_board_id'=>$job->id
                ]);
            }
        }
    }
}
