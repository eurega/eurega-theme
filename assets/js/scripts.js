jQuery(document).ready(function($) {
    $('#off-canvas').find('.is-accordion-submenu-parent > a').each(function () {
        var element = $(this);
        var submenu = element.closest('li').find('> ul.is-accordion-submenu');

        element.clone()
            .prependTo(submenu)
            .wrap('<li class="menu-item menu-item-type-post_type menu-item-object-page is-submenu-item is-accordion-submenu-item"></li>');
    });
});
(function($){

    $.fn.shuffle = function() {

        var allElems = this.get(),
            getRandom = function(max) {
                return Math.floor(Math.random() * max);
            },
            shuffled = $.map(allElems, function(){
                var random = getRandom(allElems.length),
                    randEl = $(allElems[random]).clone(true)[0];
                allElems.splice(random, 1);
                return randEl;
            });

        this.each(function(i){
            $(this).replaceWith($(shuffled[i]));
        });

        return $(shuffled);

    };

})(jQuery);

jQuery(document).ready(function($) {
    // Sponsoren durchmischen.
    $('#sidebar1').find('.sponsoren > *').shuffle();
});

jQuery(document).foundation();
/* 
These functions make sure WordPress 
and Foundation play nice together.
*/

jQuery(document).ready(function() {
    
    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();
    
	 // Makes sure last grid item floats left
	jQuery('.archive-grid .columns').last().addClass( 'end' );
	
	// Adds Flex Video to YouTube and Vimeo Embeds
	jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').wrap("<div class='flex-video'/>");

});