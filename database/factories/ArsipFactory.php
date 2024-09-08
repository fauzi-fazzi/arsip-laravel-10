<?php

namespace Database\Factories;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsip>
 */
class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'tgl_upload' => $this->faker->date(),
            'nama' => $this->faker->sentence(4),
            'deskripsi' => null,
            'file' => null, // atau $this->faker->file() jika ingin membuat file dummy
        ];
    }
}
