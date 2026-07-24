<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'transaction_date',
        'supplier',
        'note',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'quantity' => 'integer',
    ];

    /**
     * Stock In belongs to Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}