jQuery(function( $ ){

if( $( document ).scrollTop() > 0 ){
$( '.site-header' ).addClass( 'light' );
}

// Add opacity class to site header
$( document ).on('scroll', function(){

if ( $( document ).scrollTop() > 0 ){
$( '.site-header' ).addClass( 'light' );

} else {
$( '.site-header' ).removeClass( 'light' );
}

});

jQuery(function( $ ){

$('#main-nav-search-link').click(function(){
$('.search-div').show('slow');
});

$("*", document.body).click(function(event){
// event.stopPropagation();
var el = $(event.target);
var gsfrm = $(el).closest('form');
if(el.attr('id') !='main-nav-search-link' && el.attr('role') != 'search' && gsfrm.attr('role') != 'search'){
$('.search-div').hide('slow');
}
});

});


jQuery(function($) {

// Set side container height
var windowHeight = $(window).height();

$( '.side-container' ).css({
'height': windowHeight + 'px'
});

$(window).resize(function() {

var windowHeight = $(window).height();

$( '.side-container' ).css({
'height': windowHeight + 'px'
});
});

// Set side content variables
var body = $( 'body' ),
content = $( '.side-content' ),
sOpen = false;

// Toggle the side content widget area
$(document).ready(function() {

$( '.side-content-toggle' ).click(function() {
__togglesideContent();
});

});

function __togglesideContent() {

if (sOpen) {
content.fadeOut();
body.toggleClass( 'no-scroll' );
sOpen = false;
} else {
content.fadeIn();
body.toggleClass( 'no-scroll' );
sOpen = true;
}

}

});
});


jQuery(document).ready(function($){
// Scroll (in pixels) after which the "To Top" link is shown
var offset = 300,
//Scroll (in pixels) after which the "back to top" link opacity is reduced
offset_opacity = 1200,
//Duration of the top scrolling animation (in ms)
scroll_top_duration = 700,
//Get the "To Top" link
$back_to_top = $('.to-top');

//Visible or not "To Top" link
$(window).scroll(function(){
( $(this).scrollTop() > offset ) ? $back_to_top.addClass('top-is-visible') : $back_to_top.removeClass('top-is-visible top-fade-out');
if( $(this).scrollTop() > offset_opacity ) {
$back_to_top.addClass('top-fade-out');
}
});

//Smoothy scroll to top
$back_to_top.on('click', function(event){
event.preventDefault();
$('body,html').animate({
scrollTop: 0 ,
}, scroll_top_duration
);
});

});



jQuery(function( $ ){

// Sticky Announcement Bar
var headerHeight = $('.site-header').innerHeight();
var beforeheaderHeight = $('.before-header').outerHeight();
var abovenavHeight = headerHeight + beforeheaderHeight - 1;

$(window).scroll(function(){

if ($(document).scrollTop() > abovenavHeight){

$('.nav-primary, #genesis-mobile-nav-header, #genesis-mobile-nav-primary,#genesis-mobile-nav-secondary').addClass('fixed');

} else {

$('.nav-primary, #genesis-mobile-nav-header, #genesis-mobile-nav-primary, #genesis-mobile-nav-secondary').removeClass('fixed');

}

});

});


jQuery(function( $ ){

if (document.location.hash) {
window.setTimeout(function () {
document.location.href += '';
}, 10);
}

// Local Scroll Speed
$.localScroll({
duration: 750
});

// Image Section Height
var windowHeight = $( window ).height();

$( '.image-section' ) .css({'height': windowHeight +'auto'});

$( window ).resize(function(){

var windowHeight = $( window ).height();

$( '.image-section' ) .css({'height': windowHeight +'auto'});

});

});
