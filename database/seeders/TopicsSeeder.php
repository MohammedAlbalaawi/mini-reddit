<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::Create(['name' => 'Programming']);
        Topic::Create(['name' => 'Design']);
        Topic::Create(['name' => 'SEO']);
        Topic::Create(['name' => 'Business']);
        Topic::Create(['name' => 'Random']);
    }
}
