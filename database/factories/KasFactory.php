<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bulan;
use App\Models\Debit;
use App\Models\Kas;
use App\Models\Kredit;
use App\Models\Tahun;

class KasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->word(),
            'tahun_id' => Tahun::factory(),
            'bulan_id' => Bulan::factory(),
            'kredit_id' => Kredit::factory(),
            'debit_id' => Debit::factory(),
        ];
    }
}
