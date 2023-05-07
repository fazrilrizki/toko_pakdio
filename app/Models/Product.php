<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                return $query->where('product_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('product_description', 'LIKE', '%' . $search . '%');
            });
        });

        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return
        // });
    }
}
