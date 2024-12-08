<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bulan;
use App\Models\Instansi;
use App\Models\JenisPengeluaran;
use App\Models\Pengeluaran;
use App\Models\Tahun;

class PengeluaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengeluaran::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
            'nominal' => $this->faker->numberBetween(-10000, 10000),
            'kwitansi' => $this->faker->word(),
            'bulan_id' => Bulan::factory(),
            'tahun_id' => Tahun::factory(),
            'jenis_pengeluaran_id' => JenisPengeluaran::factory(),
            'instansi_id' => Instansi::factory(),
        ];
    }
}
