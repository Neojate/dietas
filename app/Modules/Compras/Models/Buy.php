<?php

namespace App\Modules\Compras\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Listas\Models\ProductList;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buy extends Model
{
    protected $table = 'buy';

    public function productList() {
        return $this->belongsTo(ProductList::class);
    }
}

asdada
