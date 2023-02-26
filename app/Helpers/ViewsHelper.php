<?php

function formatAmount($amount):string {
    return '&#8359;' . number_format($amount, 2);
}

function requestError($errors,$key): string{
    if ($errors->has($key)) {
        return "<small id='emailError' class='form-text text-danger'>{$errors->first($key)}</small>";
    }
    return '';
}
