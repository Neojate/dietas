<?php

namespace App\Modules\Listas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function scopeActive($query) {
        $query->where('active', true);
    }
}
