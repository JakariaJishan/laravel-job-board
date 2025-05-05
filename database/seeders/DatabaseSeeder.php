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
        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => 'jakaria jishan',
            'email' => 'jakaria@jishan.com',
        ]);

        $employers = Employer::factory(20)->create([
            'user_id' => fn() => $users->random()->id,
        ]);

        $jobBoards = JobBoard::factory(100)->create([
            'employer_id' => fn() => $employers->random()->id,
        ]);

        $users->each(function ($user) use ($jobBoards) {
            $jobs = $jobBoards->random(rand(0, 4));
            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'user_id' => $user->id,
                    'job_board_id' => $job->id
                ]);
            }
        });
    }
}
