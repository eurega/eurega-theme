jQuery(document).ready(function($) {
    $('#off-canvas').find('.is-accordion-submenu-parent > a').each(function () {
        var element = $(this);
        var submenu = element.closest('li').find('> ul.is-accordion-submenu');

        element.clone()
            .prependTo(submenu)
            .wrap('<li class="menu-item menu-item-type-post_type menu-item-object-page is-submenu-item is-accordion-submenu-item"></li>');
    });
});