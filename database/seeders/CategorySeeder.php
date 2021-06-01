<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $array = [
            [
                'id'    => 1,
                'name'  => 'Fruta y verdura',
                'icon'  => 'fa-carrot',
            ],
            [
                'id'    => 2,
                'name'  => 'Carne',
                'icon'  => 'fa-drumstick-bite',
            ],
            [
                'id'    => 3,
                'name'  => 'Pescado',
                'icon'  => 'fa-fish',
            ],
            [
                'id'    => 4,
                'name'  => 'Embutido',
                'icon'  => 'fa-hotdog',
            ],
            [
                'id'    => 5,
                'name'  => 'Lácteos',
                'icon'  => 'fa-cheese',
            ],
            [
                'id'    => 6,
                'name'  => 'Conservas',
                'icon'  => 'fa-prescription-bottle',
            ],
            [
                'id'    => 7,
                'name'  => 'Bebidas',
                'icon'  => 'fa-glass-cheers',
            ],
            [
                'id'    => 8,
                'name'  => 'Otros',
                'icon'  => 'fa-pizza-slice',
            ],
        ];

        foreach ($array as $item)
            DB::table('categories')->insert($item);
    }
}
