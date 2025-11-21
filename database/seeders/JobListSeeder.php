<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job_list;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class JobListSeeder extends Seeder
{
    public function run()
    {
        Job_list::factory(20)->create()->each(function ($job) {

            // 10 interview questions pool
            $questions = [
                'Why do you want to work at Sweet Treats PH?',
                'Describe a time when you handled a difficult customer.',
                'Are you willing to work on weekends and holidays?',
                'What makes you a good fit for this position?',
                'How do you handle stressful situations?',
                'Do you have experience in customer service?',
                'How do you prioritize tasks during busy hours?',
                'Describe your strengths and weaknesses.',
                'Do you work better individually or as part of a team?',
                'What do you know about Sweet Treats PH?',
                'How would you handle an incorrect order?',
                'What motivates you to work hard?',
            ];

            // Insert 10 random questions
            foreach (array_rand($questions, 10) as $i) {
                DB::table('interview_questions')->insert([
                    'job_id' => $job->id,
                    'question' => $questions[$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // 5 qualifications pool
            $qualifications = [
                'High school graduate or above',
                'Good communication skills',
                'Friendly and approachable personality',
                'Willing to learn new tasks',
                'Hardworking and responsible',
                'Experience in customer service is an advantage',
                'Able to multitask in a fast-paced environment',
                'Basic knowledge of cash handling',
                'Physically fit and able to stand for long hours',
                'Team player with a positive attitude',
            ];

            // Insert 5 random qualifications
            foreach (array_rand($qualifications, 5) as $i) {
                DB::table('job_qualification')->insert([
                    'jobid' => $job->id,
                    'qualification' => $qualifications[$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

        });
    }
}
