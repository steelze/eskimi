<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [];
        for ($i=0; $i < mt_rand(1, 2); $i++) {
            $images[] = 'campaigns/'.$this->faker->image('storage/app/public/campaigns',640,480, null, false);
        }

        return [
            'name' => $this->faker->name(),
            'from_date' => $this->faker->date(),
            'to_date' => $this->faker->date(),
            'total_budget' => $this->faker->numberBetween(40000, 100000),
            'daily_budget' => $this->faker->numberBetween(1000, 5000),
            'images' => $images,
        ];
    }
}
