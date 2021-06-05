<?php

namespace App\Modules\Listas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $table = 'productlist';

    public function scopeNotUsed($query) {
        return $query->where('used', false);
    }

    public function products() {
        return $this->hasMany(Product::class, 'productlist_id', 'id')->orderBy('category_id');
    }
}
