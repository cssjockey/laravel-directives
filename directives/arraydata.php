<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('arraydata', function ($expression) {
    if ('' === $expression || !Str::contains($expression, '|')) {
        return 'You must specify array|variable';
    }
    $expression = cjlbdMultipleArgs($expression);

    return implode('', [
        "<?php echo cjlbdArrayData({$expression->get(0, [])}, {$expression->get(1, '')}, {$expression->get(2, '')});  ?>",
    ]);
});
