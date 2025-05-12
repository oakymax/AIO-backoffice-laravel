<?php

use Illuminate\Support\Str;

if (! function_exists('json_without_line_breaks')) {
    function json_without_line_breaks(array $array): array
    {
        return json_decode(Str::replace(
            ["\r\n", "\n", "\r", '\r\n', '\n', '\r'],
            ' ',
            json_encode($array)
        ), true) ?? [];
    }
}
