<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder 
{
    public function run ()
    {
        $menuItems=[
            [
                'name'=>'Artisan Cold Brew',
                'description'=> 'Smooth cold brew with notes of chocolate and caramel',
                'price'=> 5.50,
                'category'=>'Coffe',
                'image'=>'https://images.unsplash.com/photo-1461023058943-07fcbe16d735',
                'is_featured'=>true,
                'is_popular'=>true,
                'is_new'=>false,
                'rating'=>4.8,
                'review_count'=> 125,
                'calories'=> 15,
                'prepation_time'=>5,
                'ingredients'=>['Arabica coffe','filtered water','ice'],
                'customizations'=>[
                    [
                        'name'=>'Size',
                        'type'=>'Single',
                        'options'=>[
                            ['name'=>'Regular', 'price'=>0, 
                            'is_default'=>true],
                            ['name'=>'Large', 'price'=>1.00,
                            'is_default'=>false]
                        ]
                    ],
                    [
                        'name'=>'Add-ons',
                        'type'=>'multiple',
                        'options'=>[
                            ['name'=>'Extra Ice', 'price'=>0.50,'is_default'=>false],
                            ['name'=>'Vanilla Syrup', 'price'=>0.75,'is_default'=>false],
                            ['name'=>'Caramel Drizzle', 'price'=>1.00,'is_default'=>false],
                            

                        ]
                    ]
                ]

            ],
            //Add more menu items...
        ];

        foreach($menuItems as $item){
            Menu::create($item);
        }
    }
}