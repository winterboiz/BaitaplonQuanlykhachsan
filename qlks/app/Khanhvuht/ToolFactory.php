<?php
namespace App\Khanhvuht;

class ToolFactory {
    public function getThumbnail($filename, $suffix = '_thumb') {
        if ($filename) {
//            2017-04/b2d497b69515658e67d80d135b7d0b54.png
            return preg_replace("/(.*)\.(.*)/i", "$1{$suffix}.$2", $filename);
        }
        return '';
    }

    public function getCurrencyVN($number, $symbol = 'VND', $isPrefix = false) {
        if ($isPrefix) {
            return $symbol . number_format($number, 0, ',', '.');
        } else {
            return number_format($number, 0, ',', '.') . $symbol;
        }
    }
}