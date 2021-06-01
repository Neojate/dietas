<?php

namespace App\Modules\Listas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function products() {
        return $this->belongsTo(ProductList::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
