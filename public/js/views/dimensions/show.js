jQuery.noConflict();

jQuery(document).ready(function() {
    jQuery('tr.obj_row a').on('click', function() {
        if (jQuery(this).hasClass('active'))
        {
            jQuery('tr.' + jQuery(this).attr('rel')).hide();
            jQuery(this).html('+');
            jQuery(this).removeClass('active');
        }
        else {
            jQuery('tr.' + jQuery(this).attr('rel')).show();
            jQuery(this).html('-');
            jQuery(this).addClass('active');
        }
    });
    
    jQuery('tr.ini_row a').on('click', function() {
        if (jQuery(this).hasClass('active'))
        {
            jQuery('tr.' + jQuery(this).attr('rel')).hide();
            jQuery(this).html('+');
            jQuery(this).removeClass('active');
        }
        else {
            jQuery('tr.' + jQuery(this).attr('rel')).show();
            jQuery(this).html('-');
            jQuery(this).addClass('active');
        }
    });
    
});