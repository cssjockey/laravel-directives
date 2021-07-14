<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('isuser', function ($expression) {
    if ('' !== $expression) {
        $expression = cjlbdStripQuotes($expression);
        if (!is_null(auth()->user())) {
            return $expression;
        }
    }

    return '<?php if(!is_null(auth()->user())): ?>';
});

Blade::directive('endisuser', function () {
    return '<?php endif; ?>';
});
