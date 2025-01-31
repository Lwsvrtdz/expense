<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            return;
        }

        $categories = $user->categories;
        
        if ($categories->isEmpty()) {
            return;
        }

        $expenses = [
            // Food & Dining expenses
            [
                'title' => 'Weekly Groceries',
                'description' => 'Grocery shopping at Walmart',
                'amount' => 125.50,
                'date' => Carbon::now()->subDays(1),
                'category_id' => $categories->where('name', 'Food & Dining')->first()->id,
            ],
            [
                'title' => 'Restaurant Dinner',
                'description' => 'Dinner at Italian Restaurant',
                'amount' => 45.75,
                'date' => Carbon::now()->subDays(2),
                'category_id' => $categories->where('name', 'Food & Dining')->first()->id,
            ],
            
            // Transportation expenses
            [
                'title' => 'Monthly Transit Pass',
                'description' => 'Monthly Bus Pass',
                'amount' => 60.00,
                'date' => Carbon::now()->subDays(5),
                'category_id' => $categories->where('name', 'Transportation')->first()->id,
            ],
            [
                'title' => 'Gas Station',
                'description' => 'Car Fuel',
                'amount' => 45.00,
                'date' => Carbon::now()->subDays(3),
                'category_id' => $categories->where('name', 'Transportation')->first()->id,
            ],
            
            // Housing expenses
            [
                'title' => 'Apartment Rent',
                'description' => 'Monthly Rent',
                'amount' => 1200.00,
                'date' => Carbon::now()->startOfMonth(),
                'category_id' => $categories->where('name', 'Housing')->first()->id,
            ],
            [
                'title' => 'Electric Company Bill',
                'description' => 'Electricity Bill',
                'amount' => 85.50,
                'date' => Carbon::now()->subDays(7),
                'category_id' => $categories->where('name', 'Housing')->first()->id,
            ],
            
            // Entertainment expenses
            [
                'title' => 'Cinema Tickets',
                'description' => 'Movie Tickets',
                'amount' => 30.00,
                'date' => Carbon::now()->subDays(4),
                'category_id' => $categories->where('name', 'Entertainment')->first()->id,
            ],
            [
                'title' => 'Netflix Monthly',
                'description' => 'Netflix Subscription',
                'amount' => 15.99,
                'date' => Carbon::now()->subDays(10),
                'category_id' => $categories->where('name', 'Entertainment')->first()->id,
            ],
            
            // Shopping expenses
            [
                'title' => 'Nike Running Shoes',
                'description' => 'New Shoes',
                'amount' => 89.99,
                'date' => Carbon::now()->subDays(15),
                'category_id' => $categories->where('name', 'Shopping')->first()->id,
            ],
            [
                'title' => 'North Face Jacket',
                'description' => 'Winter Jacket',
                'amount' => 120.00,
                'date' => Carbon::now()->subDays(20),
                'category_id' => $categories->where('name', 'Shopping')->first()->id,
            ],
            
            // Healthcare expenses
            [
                'title' => 'Pharmacy',
                'description' => 'Monthly Medicine',
                'amount' => 45.00,
                'date' => Carbon::now()->subDays(8),
                'category_id' => $categories->where('name', 'Healthcare')->first()->id,
            ],
            
            // Education expenses
            [
                'title' => 'Udemy Course',
                'description' => 'Online Course Subscription',
                'amount' => 199.99,
                'date' => Carbon::now()->subDays(25),
                'category_id' => $categories->where('name', 'Education')->first()->id,
            ],
            
            // Bills & Utilities
            [
                'title' => 'Internet Service',
                'description' => 'Internet Bill',
                'amount' => 79.99,
                'date' => Carbon::now()->subDays(6),
                'category_id' => $categories->where('name', 'Bills & Utilities')->first()->id,
            ],
            [
                'title' => 'Mobile Plan',
                'description' => 'Phone Bill',
                'amount' => 65.00,
                'date' => Carbon::now()->subDays(6),
                'category_id' => $categories->where('name', 'Bills & Utilities')->first()->id,
            ],
        ];

        foreach ($expenses as $expense) {
            $expense['user_id'] = $user->id;
            Expense::create($expense);
        }
    }
}
