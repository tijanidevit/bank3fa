<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class TransactionType extends Enum
{
    public const CREDIT = "credit";
    public const DEBIT = "debit";
}
