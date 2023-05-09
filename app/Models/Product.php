<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    }

    public function productTypes(): BelongsTo{
        return $this->belongsTo(ProductTypesModel::class);
    }

    public function path()
    {
        return asset('img/' . $this->name);
    }
}
