<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kela;
use App\Models\Siswa;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'nisn' => $this->faker->word(),
            'nis' => $this->faker->word(),
            'tempat_lahir' => $this->faker->word(),
            'tanggal_lahir' => $this->faker->word(),
            'jenis_kelamin' => $this->faker->word(),
            'alamat' => $this->faker->word(),
            'nama_ibu' => $this->faker->word(),
            'nama_ayah' => $this->faker->word(),
            'foto' => $this->faker->word(),
            'telepon_orangtua' => $this->faker->word(),
            'status' => $this->faker->boolean(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'nama_bank' => $this->faker->word(),
            'nama_rekening' => $this->faker->word(),
            'nomor_rekening' => $this->faker->word(),
            'kelas_id' => Kela::factory(),
            'riwayat_kelas' => $this->faker->word(),
        ];
    }
}
