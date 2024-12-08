<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Tingkat;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'jurusan_id' => Jurusan::factory(),
            'tingkat_id' => Tingkat::factory(),
        ];
    }
}
