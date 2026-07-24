<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'price',
        'description',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(StockTransaction::class);
    }

   public function getCurrentStockAttribute(): int
{
    return $this->transactions->reduce(function ($stock, $transaction) {

        return $transaction->type === 'IN'
            ? $stock + $transaction->quantity
            : $stock - $transaction->quantity;

    }, 0);
}
}