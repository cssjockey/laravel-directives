<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('typeof', function ($expression) {
    // $expression = cjlbdStripQuotes($expression);
    $expression = cjlbdMultipleArgs($expression);
    return  "<?php if (gettype({$expression->get(0)}) == {$expression->get(1)}) : ?>";
});

Blade::directive('endtypeof', function () {
    return '<?php endif; ?>';
});
