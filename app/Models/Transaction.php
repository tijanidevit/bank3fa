<?php

namespace App\Models;

use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'balance_before',
        'balance_after',
        'remark',
        'type',
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function ($query) {
            $query->orderBy('id', 'desc');
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOnlyCredit($query)
    {
        $query->where('type', TransactionType::CREDIT);
    }
    public function scopeOnlyDebit($query)
    {
        $query->where('type', TransactionType::DEBIT);
    }
}
