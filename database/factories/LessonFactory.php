<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_classes_id' => rand(1,13),
            'subjects_id' => rand(1,310),
            'teachers_id' => rand(1,120),
            'users_id' => rand(1,20),
            'scheme' => rand(1,5),
            'course_outline' => rand(1,5),
            'learning_objectives' => rand(1,5),
            'knowledge' => rand(1,5),
            'relevant' => rand(1,5),
            'dressing' => rand(1,5),
            'assignments' => rand(1,5),
            'notes' => rand(1,5),
            'class_control' => rand(1,5),
            'evaluation' => rand(1,5),
            'feedback' => rand(1,5),
            'praised' => rand(1,5),
            'poor_behaviour' => rand(1,5),
            'learner_engagement' => rand(1,5),
            'time_utilisation' => rand(1,5),
            'caie_demands' => rand(1,5),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
