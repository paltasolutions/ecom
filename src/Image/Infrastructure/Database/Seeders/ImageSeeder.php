<?php

namespace PaltaSolutions\Image\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use PaltaSolutions\Image\Domain\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::factory()->create();
    }
}
