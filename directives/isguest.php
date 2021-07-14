<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('isguest', function ($expression) {
    if ('' !== $expression) {
        return implode('', [
            "<?php if(is_null(auth()->user())): ?>",
            "<?php echo {$expression}; ?>",
            "<?php endif; ?>",
        ]);
    }

    return '<?php if(is_null(auth()->user())): ?>';
});

Blade::directive('endisguest', function () {
    return '<?php endif; ?>';
});
