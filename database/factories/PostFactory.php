<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(6, true);

        return [

            'name'=>$name,
            'slug'=>Str::slug($name),
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([1,2]),
            'category_id'=> Category::all()->random()->id,
            'user_id'=> User::all()->random()->id,
            'visitas'=>$this->faker->randomNumber(),
            'calificacion'=>$this->faker->randomFloat(2,1,5),
            'postable_type'=>$this->faker->randomElement(['Video','Articulo']),

        ];
    }
}
