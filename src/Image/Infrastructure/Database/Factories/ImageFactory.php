<?php

declare(strict_types=1);

namespace PaltaSolutions\Image\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PaltaSolutions\Image\Domain\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\PaltaSolutions\Image\Domain\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'alt' => md5('' . time()) . '.jpg',
            'title' => $this->faker->sentence(3),
            'src' => $this->faker->imageUrl(),
        ];
    }
}
