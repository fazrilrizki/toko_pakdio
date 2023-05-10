<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductTypesModel extends Model
{
    use HasFactory;

    protected $table = "product_types";

    public function product(): HasMany{
        return $this->hasMany(Product::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                return $query->where('types_name', 'LIKE', '%' . $search . '%');
            });
        });
    }
}
