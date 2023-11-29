<?php
use App\Khanhvuht\Facades\Tool;

if (!function_exists('get_thumbnail')) {
    function get_thumbnail($filename, $suffix = '_thumb') {
        return Tool::getThumbnail($filename, $suffix);
    }
}

if (!function_exists('get_currency_vn')) {
    function get_currency_vn($number, $symbol = ' VND', $isPrefix = false) {
        return Tool::getCurrencyVN($number, $symbol, $isPrefix);
    }
}
