<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use App\Http\Requests\ExpenseRequest;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = auth()->user()->expenses()
            ->with('category')
            ->latest()
            ->get();

        $totalExpenses = $expenses->sum('amount');
        $monthlyExpenses = $expenses->where('date', '>=', now()->startOfMonth())->sum('amount');
        
        $categoryTotals = auth()->user()->categories()
            ->withSum('expenses', 'amount')
            ->get()
            ->map(function ($category) {
                return [
                    'name' => $category->name,
                    'color' => $category->color,
                    'total' => $category->expenses_sum_amount ?? 0
                ];
            });

        return Inertia::render('Expenses/Index', [
            'expenses' => $expenses,
            'statistics' => [
                'total' => $totalExpenses,
                'monthly' => $monthlyExpenses,
                'byCategory' => $categoryTotals
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()->categories()->get(['id', 'name', 'color']);
        
        return Inertia::render('Expenses/Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $expense = Expense::create($request->validated());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);

        $categories = auth()->user()->categories()->get(['id', 'name', 'color']);
        
        return Inertia::render('Expenses/Edit', [
            'expense' => $expense,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $this->authorize('update', $expense);
        
        $expense->update($request->validated());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);
        
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully.');
    }
}
