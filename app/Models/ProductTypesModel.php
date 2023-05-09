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
}
