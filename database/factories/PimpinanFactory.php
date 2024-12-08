<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pimpinan;
use App\Models\Tahun;

class PimpinanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pimpinan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'nip' => $this->faker->word(),
            'nuptk' => $this->faker->word(),
            'foto' => $this->faker->word(),
            'tte' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'tahun_id' => Tahun::factory(),
        ];
    }
}
