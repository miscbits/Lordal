<?php

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
        \App\User::create([
			"name" => "wilhem",
			"email" => "willow6786@gmail.com",
			"staff" => false,
        ]);

        \App\User::create([
			"name" => "Wilhem Alcivar",
			"email" => "wilhem@zipcodewilmington.com",
			"staff" => true,
        ]);

        factory(\App\Student::class, 1)->create(['user_id' => 1, 'github_username' => 'miscbits'])
        		->each(function($student) {
        			factory(\App\Comment::class, 3)
        				->create(['user_id' => 2, 'student_id' => $student->id]);
        			});


        factory(\App\User::class, 41)->create()->each(function($user) {
        	factory(\App\Student::class)->create(['user_id' => $user->id])
        		->each(function($student) {
        			factory(\App\Comment::class, 3)
        				->create(['user_id' => 2, 'student_id' => $student->id]);
    		});
        });

        $students = \App\Student::all();

        factory(\App\Assessment::class, 50)->create()->each(function($assessment) use ($students) {
        	$assessment->students()->attach($students);
        });

        foreach (\App\Assignment::all() as $assignment) {
        	if(rand(0,1) == 1) {
        		factory(\App\Submission::class, 1)->create(["assignment_id" => $assignment->id]);
        	}
        }

    }
}
