<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder 
{
    public function run()
    {
        $menuItems = [

            // ☕ COFFEE
            [
                'name' => 'Artisan Cold Brew',
                'description' => 'Smooth cold brew with notes of chocolate and caramel',
                'price' => 55000,
                'category' => 'Coffee',
                'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735',
                'is_featured' => true,
                'is_popular' => true,
                'is_new' => false,
                'rating' => 4.8,
                'review_count' => 125,
                'calories' => 15,
                'prepation_time' => 5,
                'ingredients' => ['Arabica coffee', 'filtered water', 'ice'],
                'customizations' => [],
            ],
            [
                'name' => 'Americano',
                'description' => 'Classic black coffee with a bold and rich taste',
                'price' => 30000,
                'category' => 'Coffee',
                'image' => null,
                'is_featured' => false,
                'is_popular' => true,
                'is_new' => false,
                'rating' => 4.5,
                'review_count' => 98,
                'calories' => 5,
                'prepation_time' => 4,
                'ingredients' => ['Espresso', 'Hot water'],
                'customizations' => [],
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Espresso with steamed milk and thick foam',
                'price' => 35000,
                'category' => 'Coffee',
                'image' => null,
                'is_featured' => false,
                'is_popular' => true,
                'is_new' => false,
                'rating' => 4.7,
                'review_count' => 110,
                'calories' => 120,
                'prepation_time' => 6,
                'ingredients' => ['Espresso', 'Milk', 'Milk foam'],
                'customizations' => [],
            ],
            [
                'name' => 'Caramel Latte',
                'description' => 'Smooth latte blended with caramel sweetness',
                'price' => 38000,
                'category' => 'Coffee',
                'image' => null,
                'is_featured' => true,
                'is_popular' => true,
                'is_new' => true,
                'rating' => 4.9,
                'review_count' => 150,
                'calories' => 180,
                'prepation_time' => 6,
                'ingredients' => ['Espresso', 'Milk', 'Caramel syrup'],
                'customizations' => [],
            ],

            // 🍵 TEA
            [
                'name' => 'Earl Grey Tea',
                'description' => 'Black tea infused with bergamot aroma',
                'price' => 25000,
                'category' => 'Tea',
                'image' => null,
                'is_featured' => false,
                'is_popular' => true,
                'is_new' => false,
                'rating' => 4.4,
                'review_count' => 70,
                'calories' => 0,
                'prepation_time' => 4,
                'ingredients' => ['Black tea', 'Bergamot'],
                'customizations' => [],
            ],
            [
                'name' => 'Chamomile Tea',
                'description' => 'Calming herbal tea for relaxation',
                'price' => 28000,
                'category' => 'Tea',
                'image' => null,
                'is_featured' => false,
                'is_popular' => false,
                'is_new' => true,
                'rating' => 4.6,
                'review_count' => 55,
                'calories' => 0,
                'prepation_time' => 5,
                'ingredients' => ['Chamomile flowers'],
                'customizations' => [],
            ],
        ];

        foreach ($menuItems as $item) {
            Menu::create($item);
        }
    }
}