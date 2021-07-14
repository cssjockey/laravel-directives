<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('arraydata', function ($expression) {
    $expression = cjlbdMultipleArgs($expression);

    return implode('', [
        "<?php echo cjlbdArrayData({$expression->get(0)}, {$expression->get(1)}, {$expression->get(2, '')});  ?>",
    ]);
});
