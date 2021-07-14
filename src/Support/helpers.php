<?php

use Illuminate\Support\Arr;

if (!function_exists('cjlbdStripQuotes')) {
    function cjlbdStripQuotes($expression)
    {
        return str_replace(["'", '"'], '', $expression);
    }
}

if (!function_exists('cjlbdMultipleArgs')) {
    function cjlbdMultipleArgs($expression, $separator = '|')
    {
        return collect(explode($separator, $expression))->map(function ($item) {
            return trim($item);
        });
    }
}

if (!function_exists('cjlbdArrayData')) {
    function cjlbdArrayData($array, $key, $default = '')
    {
        $return = Arr::get($array, $key, $default);

        return (is_array($return)) ? json_encode($return) : $return;
    }
}

if (!function_exists('cjlbdFormatHtml')) {
    function cjlbdFormatHtml($content, $tab = "\t")
    {
        $content = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $content);
        $token = strtok($content, "\n");
        $result = '';
        $pad = 0;
        $matches = [];
        while (false !== $token && strlen($token) > 0) {
            $padPrev = $padPrev ?? $pad;
            $token = trim($token);
            if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) {
                $indent = 0;
            } elseif (preg_match('/^<\/\w/', $token, $matches)) {
                --$pad;
                if (isset($indent) && $indent > 0) {
                    $indent = 0;
                }
            } elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) {
                foreach ($matches as $m) {
                    if (preg_match('/^<(area|base|br|col|command|embed|hr|img|input|keygen|link|meta|param|source|track|wbr)/im', $m)) {
                        $voidTag = true;

                        break;
                    }
                }
                $indent = 1;
            } else {
                $indent = 0;
            }
            $line = str_pad($token, strlen($token) + $pad, $tab, STR_PAD_LEFT);
            $result .= $line."\n";
            $token = strtok("\n");
            $pad += $indent;
            if (isset($voidTag) && $voidTag) {
                $voidTag = false;
                --$pad;
            }
        }

        return $result;
    }
}
