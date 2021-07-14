<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('code', function ($expression = '') {
    if ('' !== $expression) {
        return implode('', [
            "<?php echo '<pre style=\"display:inline-block;\">';  ?>",
            "<?php echo cjlbdFormatHtml(htmlspecialchars({$expression}, ENT_COMPAT));  ?>",
            "<?php echo '</pre>';  ?>",
        ]);
    }

    return implode('', [
        "<?php echo '<pre>'; ?>",
        '<?php ob_start(); ?>',
    ]);
});

Blade::directive('endcode', function () {
    return implode('', [
        '<?php echo cjlbdFormatHtml(htmlspecialchars(ob_get_clean(), ENT_COMPAT)); ?>',
        "<?php echo '</pre>'; ?>",
    ]);
});
