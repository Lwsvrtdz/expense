<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalExpenses = $user->expenses()->sum('amount');
        $categories = $user->categories()->withCount('expenses')->withSum('expenses', 'amount')->get();

        return Inertia::render('Dashboard', [
            'totalExpenses' => $totalExpenses,
            'categories' => $categories,
        ]);
    }
}
