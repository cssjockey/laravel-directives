<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('isfalse', function ($expression) {
    if($expression === ''){
        return '';
    }
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            "<?php if((bool) ({$expression->get(0)}) === false): ?>",
            "<?php echo {$expression->get(1)}; ?>",
            '<?php endif; ?>',
        ]);
    }

    return "<?php if((bool) ({$expression}) === false): ?>";
});

Blade::directive('endisfalse', function () {
    return '<?php endif; ?>';
});
