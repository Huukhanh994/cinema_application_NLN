<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code'      => 'subtitle',
            'name'      => 'Subtitle',
            'frontend_type' => 'select',
            'is_filterable'     => 1,
            'is_required'   => 1,
            'notes' => 'phu de Viet - Anh'
        ]);

        Attribute::create([
            'code'      => 'movie_technology',
            'name'      => 'Movie Technology',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required'   => 1,
            'notes' => 'Ky thuat hinh anh IMAX - 4DX'
        ]);
    }
}
