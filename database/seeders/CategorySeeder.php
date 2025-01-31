<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        $categories = [
            [
                'name' => 'Food & Dining',
                'description' => 'Restaurants, groceries, and food delivery',
                'color' => '#FF6B6B',
                'user_id' => $user->id
            ],
            [
                'name' => 'Transportation',
                'description' => 'Public transport, fuel, and vehicle maintenance',
                'color' => '#4ECDC4',
                'user_id' => $user->id
            ],
            [
                'name' => 'Housing',
                'description' => 'Rent, utilities, and home maintenance',
                'color' => '#45B7D1',
                'user_id' => $user->id
            ],
            [
                'name' => 'Entertainment',
                'description' => 'Movies, games, and recreational activities',
                'color' => '#96CEB4',
                'user_id' => $user->id
            ],
            [
                'name' => 'Shopping',
                'description' => 'Clothing, electronics, and personal items',
                'color' => '#D4A5A5',
                'user_id' => $user->id
            ],
            [
                'name' => 'Healthcare',
                'description' => 'Medical expenses, medications, and insurance',
                'color' => '#9B59B6',
                'user_id' => $user->id
            ],
            [
                'name' => 'Education',
                'description' => 'Tuition, books, and courses',
                'color' => '#3498DB',
                'user_id' => $user->id
            ],
            [
                'name' => 'Bills & Utilities',
                'description' => 'Phone, internet, and other recurring bills',
                'color' => '#E67E22',
                'user_id' => $user->id
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
