<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class transaksiPemesanan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pemesanan';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                return $query->where('saldo_elektronik', 'LIKE', '%' . $search . '%')
                ->orWhere('saldo_elektronik', 'LIKE', '%' . $search . '%');
            });
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function product(): HasOne{
        return $this->hasOne(Product::class, 'id');
    }
}
