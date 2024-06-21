<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $courseName = $faker->words(3, true);
            $course = Course::create([
                'name' => $courseName,
                'image' => ""
            ]);

            // Generate a random image
            $imageName = time() . '_' . $faker->word . '.jpg';
            $imagePath = "course/{$course->id}/{$imageName}";

            // Store the image
            $imageContent = $faker->image(null, 640, 480, null, true);
            Storage::disk('resources')->put($imagePath, file_get_contents($imageContent));

            // Update the course with the image name
            $course->update(['image' => $imageName]);
        }
    }
}

