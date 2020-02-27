<?php

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subtitles = ['VN','EN','KO','CN'];
        $mtechnologies = ['4DX','IMAX','SCEENX'];

        foreach($subtitles as $sub)
        {
            AttributeValue::create([
                'attribute_id'  => 1,
                'value' => $sub,
                'price' => null,
            ]);
        }

        foreach($mtechnologies as $mtech)
        {
            AttributeValue::create([
                'attribute_id'  =>  2,
                'value'     => $mtech,
                'price' => null,
            ]);
        }
    }
}
