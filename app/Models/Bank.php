<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function scopeOnlyActive($query) {
        return $query->whereIsActive(1);
    }
}
