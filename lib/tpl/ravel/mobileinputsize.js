    // make the size="" attribute empty when
    // ---> editing pages
    // jQuery(document).ready(function() { // <html> tag has loaded

    //jQuery(window).load(function() { // deprecated since jquery 1.8
                                         // .load event handling suite removed in jquery 3
    jQuery(window).on('load', function() { // web page has finished loading

    function isMobile() {
    var index = navigator.appVersion.indexOf("Mobile"); // detect chrome for android and ios safari
    var index2 = navigator.appVersion.indexOf("Android"); // detect firefox for android
    if (index2) { return (index2 > -1); }
    return (index > -1);
    }   

    usingmobile = isMobile();
    if (usingmobile){
        jQuery('input').filter(function(){
        return !jQuery(this).attr('size');
        }).attr('size',''); // change to a number if desired
        jQuery('textarea').filter(function(){
        return !jQuery(this).attr('size');
        }).attr('cols',''); // change to a number if desired

        jQuery("#edit__summary").attr('size', '');
    }
       
});