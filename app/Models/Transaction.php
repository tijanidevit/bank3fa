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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function onlyCredit($query)
    {
        $query->where('type', TransactionType::CREDIT);
    }
    public function onlyDebit($query)
    {
        $query->where('type', TransactionType::DEBIT);
    }
}
