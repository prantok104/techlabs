(function($) {
    'use strict';
    $(function() {
        $("#tab").pagination({
            items: 5,
            contents: 'pegenation',
            previous: '<<',
            next: '>>',
            position: 'bottom',
        });
    });
})(jQuery);

