<?php

namespace App\Models;

use App\Enums\OTPType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserOtp extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'otp'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOnlyRegistration($query) {
        return $query->where('type', OTPType::REGISTRATION);
    }

    public function scopeOnlyTransfer($query) {
        return $query->where('type', OTPType::TRANSFER);
    }
}
