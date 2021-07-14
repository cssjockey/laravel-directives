<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;

Blade::directive('modeldata', function ($expression) {
    if ('' === $expression || Str::substrCount($expression, '|') !== 2) {
        return '';
    }

    $expression = cjlbdStripQuotes($expression);
    $expression = cjlbdMultipleArgs($expression);
    $model_class = $expression->get(0);
    $model_id = $expression->get(1);
    $return_field = $expression->get(2);
    $data = (new $model_class())->where('id', $model_id)->first();

    return $data->{$return_field};
});
