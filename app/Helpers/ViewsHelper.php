<?php

function formatAmount($amount):string {
    return '&#8358;' . number_format($amount, 2);
}
function formatDate($date):string {
    return $date->format('d/m/y');
}

function requestError($errors,$key): string{
    if ($errors->has($key)) {
        return "<small id='emailError' class='form-text text-danger'>{$errors->first($key)}</small>";
    }
    return '';
}
