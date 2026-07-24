<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockTransaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalCategories = Category::count();

        $totalProducts = Product::count();

        $currentStock = Product::with('transactions')
            ->get()
            ->sum(function ($product) {
                return $product->current_stock;
            });

        $transactionsToday = StockTransaction::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        // 5 transaksi terbaru
        $recentTransactions = StockTransaction::with('product')
            ->latest()
            ->take(5)
            ->get();

        // Produk dengan stok <= 5
        $lowStockProducts = Product::with('transactions')
            ->get()
            ->filter(function ($product) {
                return $product->current_stock <= 5;
            })
            ->sortBy('current_stock')
            ->take(5);

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'currentStock',
            'transactionsToday',
            'recentTransactions',
            'lowStockProducts'
        ));
    }
}