<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('isnotnull', function ($expression) {
    if($expression === ''){
        return '';
    }
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            "<?php if(!is_null({$expression->get(0)})): ?>",
            "<?php echo {$expression->get(1)}; ?>",
            '<?php endif; ?>',
        ]);
    }

    return "<?php if(!is_null({$expression})): ?>";
});

Blade::directive('endisnotnull', function () {
    return '<?php endif; ?>';
});
