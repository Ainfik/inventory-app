<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'transaction_date',
        'destination',
        'note',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'quantity' => 'integer',
    ];

    /**
     * Stock Out belongs to Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}