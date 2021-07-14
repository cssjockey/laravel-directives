<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('tagattributes', function ($expression) {
    if($expression === ''){
        return '';
    }
    $expression = cjlbdMultipleArgs($expression, '|');
    $output = 'collect((array) '.$expression->get(0).')
            ->map(function($value, $key) {
                return "{$key}=\"{$value}\"";
            })
            ->implode(" ")';

    return "<?php echo {$output}; ?>";
});
