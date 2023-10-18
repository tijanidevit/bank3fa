<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class OTPType extends Enum
{
    public const REGISTRATION = "registration";
    public const TRANSFER = "transfer";
}
