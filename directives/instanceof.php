<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('instanceof', function ($expression) {
    if($expression === ''){
        return  '';
    }
    $expression = cjlbdStripQuotes($expression);
    $expression = cjlbdMultipleArgs($expression);
    return  "<?php if ({$expression->get(0)} instanceof {$expression->get(1)}) : ?>";
});

Blade::directive('endinstanceof', function () {
    return '<?php endif; ?>';
});
