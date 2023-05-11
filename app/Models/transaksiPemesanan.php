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
                return $query->where('total_harga', 'LIKE', '%' . $search . '%')
                ->orWhere('alamat_pembelian', 'LIKE', '%' . $search . '%');
            });
        });

        // $query->join('users', 'users.id', '=', 'transaksi_pemesanan.id')
        // ->when($filters['search'] ?? false, function ($query, $search) {
        //     return $query->where(function ($query) use ($search) {
        //         return $query->where('total_harga', 'LIKE', '%' . $search . '%')
        //         ->orWhere('alamat_pembelian', 'LIKE', '%' . $search . '%');
        //     });
        // });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
