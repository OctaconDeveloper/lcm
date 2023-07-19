<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deport extends Model
{ 
    use HasFactory;
    protected $guarded = ['id'];

    protected function unit() {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    protected function officer() {
        return $this->belongsTo(User::class, 'officer_id');
    }

    protected function inventory() {
        return $this->hasMany(Inventory::class, 'deport_id');
    }

}
