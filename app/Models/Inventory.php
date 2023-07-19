<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected function deport() {
        return $this->belongsTo(Deport::class, 'deport_id');
    }
}
