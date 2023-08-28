<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->sentence(4);
            $newProject->author = $faker->name();
            $newProject->image = $faker->imageUrl(480, 360, "image", true, "images", false, "png");
            $newProject->content = $faker->paragraph(5, true);
            $newProject->save();
        }
    }
}
