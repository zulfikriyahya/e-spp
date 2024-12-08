<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bulan;
use App\Models\Debit;
use App\Models\Pemasukkan;
use App\Models\Pembayaran;
use App\Models\Tahun;

class DebitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Debit::class;

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
            'pemasukkan_id' => Pemasukkan::factory(),
            'pembayaran_id' => Pembayaran::factory(),
        ];
    }
}
