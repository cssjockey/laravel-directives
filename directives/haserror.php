<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;

Blade::directive('haserror', function ($expression) {
    if($expression === ''){
        return '';
    }
    if (Str::contains($expression, '|')) {
        $expression = cjlbdMultipleArgs($expression);

        return implode('', [
            '<?php if (isset($errors) && $errors->has('.$expression->get(0).')): ?>',
            "<?php echo {$expression->get(1)}; ?>",
            '<?php endif; ?>',
        ]);
    }

    return '<?php if (isset($errors) && $errors->has('.$expression.')): ?>';
});

Blade::directive('endhaserror', function () {
    return '<?php endif; ?>';
});
