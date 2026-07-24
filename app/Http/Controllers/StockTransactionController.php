<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockTransactionRequest;
use App\Http\Requests\UpdateStockTransactionRequest;
use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index(Request $request)
{
    $transactions = StockTransaction::with('product')

        ->when($request->filled('search'), function ($query) use ($request) {

            $query->whereHas('product', function ($product) use ($request) {

                $product->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('sku', 'like', '%' . $request->search . '%');

            });

        })

        ->when($request->filled('type'), function ($query) use ($request) {

            $query->where('type', $request->type);

        })

        ->latest()

        ->paginate(10)

        ->withQueryString();

    return view('transactions.index', [

        'transactions' => $transactions,

        'search' => $request->search,

        'type' => $request->type,

    ]);
}

    /**
     * Show create form.
     */
    public function create()
    {
        $products = Product::with('transactions')
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('transactions.create', compact('products'));
    }

    /**
     * Store new transaction.
     */
    public function store(StoreStockTransactionRequest $request)
    {
        $data = $request->validated();

        $product = Product::with('transactions')
            ->findOrFail($data['product_id']);

        if (
            $data['type'] === 'OUT' &&
            $data['quantity'] > $product->current_stock
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'quantity' => 'Stock is not sufficient for this transaction.',
                ]);
        }

        StockTransaction::create([
            'product_id' => $data['product_id'],
            'type'       => $data['type'],
            'quantity'   => $data['quantity'],
            'note'       => $data['note'],
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Stock transaction created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(StockTransaction $transaction)
    {
        $products = Product::with('transactions')
            ->where('status', true)
            ->orderBy('name')
            ->get();

        return view('transactions.edit', compact(
            'transaction',
            'products'
        ));
    }

    /**
     * Update transaction.
     */
    public function update(
        UpdateStockTransactionRequest $request,
        StockTransaction $transaction
    ) {
        $data = $request->validated();

        $product = Product::with('transactions')
            ->findOrFail($data['product_id']);

        // Hitung stok yang tersedia seolah transaksi lama dibatalkan
        $availableStock = $product->current_stock;

        if ($transaction->type === 'IN') {
            $availableStock -= $transaction->quantity;
        } else {
            $availableStock += $transaction->quantity;
        }

        // Validasi stok jika transaksi baru adalah OUT
        if (
            $data['type'] === 'OUT' &&
            $data['quantity'] > $availableStock
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'quantity' => 'Stock is not sufficient for this transaction.',
                ]);
        }

        $transaction->update([
            'product_id' => $data['product_id'],
            'type'       => $data['type'],
            'quantity'   => $data['quantity'],
            'note'       => $data['note'],
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified transaction.
     */
    public function destroy(StockTransaction $transaction)
    {
        $product = Product::with('transactions')
            ->findOrFail($transaction->product_id);

        // Cegah penghapusan transaksi IN apabila
        // menyebabkan stok menjadi negatif
        if (
            $transaction->type === 'IN' &&
            $product->current_stock < $transaction->quantity
        ) {
            return redirect()
                ->route('transactions.index')
                ->withErrors([
                    'delete' => 'Transaction cannot be deleted because it would result in negative stock.',
                ]);
        }

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}