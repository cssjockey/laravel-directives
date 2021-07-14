<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('istrue', function ($expression) {
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            "<?php if((bool) ({$expression->get(0)}) === true): ?>",
            "<?php echo {$expression->get(1)}; ?>",
            '<?php endif; ?>',
        ]);
    }

    return "<?php if((bool) ({$expression}) === true): ?>";
});

Blade::directive('endistrue', function () {
    return '<?php endif; ?>';
});
