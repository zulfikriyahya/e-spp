<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bulan;
use App\Models\Kredit;
use App\Models\Pengeluaran;
use App\Models\Tahun;

class KreditFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kredit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
            'bulan_id' => Bulan::factory(),
            'tahun_id' => Tahun::factory(),
            'pengeluaran_id' => Pengeluaran::factory(),
        ];
    }
}
