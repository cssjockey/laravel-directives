<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('isguest', function ($expression) {
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            '<?php if(is_null(auth()->user())): ?>',
            "<?php echo {$expression->get(0)}; ?>",
            '<?php else: ?>',
            "<?php echo {$expression->get(1)}; ?>",
            '<?php endif; ?>',
        ]);
    }

    return '<?php if(!is_null(auth()->user())): ?>';
});

Blade::directive('endisguest', function () {
    return '<?php endif; ?>';
});
