<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected function startunit() {
        return $this->belongsTo(Unit::class, 'start_unit');
    }

    protected function endunit() {
        return $this->belongsTo(Unit::class, 'end_unit');
    }

    protected function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }



    protected function sendOfficer() {
        return $this->belongsTo(User::class, 'sending_officer_id');
    }

    protected function receiveOfficer() {
        return $this->belongsTo(User::class, 'receiving_officer_id');
    }

}
 