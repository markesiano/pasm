<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageProvider = new Image($this->faker);
        $imageUrl = $imageProvider->imageUrl(
            array(
                'category' => 'people',
                'keywords' => 'psicólogo, terapeuta, psiquiatra',
            )
        );

        return [
            'url' => $imageUrl,

            //
        ];
    }
}

