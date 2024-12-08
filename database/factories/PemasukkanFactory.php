<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bulan;
use App\Models\JenisPemasukkan;
use App\Models\Pemasukkan;
use App\Models\Tahun;

class PemasukkanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemasukkan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
            'nominal' => $this->faker->numberBetween(-10000, 10000),
            'jenis_pemasukkan_id' => JenisPemasukkan::factory(),
            'bulan_id' => Bulan::factory(),
            'tahun_id' => Tahun::factory(),
        ];
    }
}
