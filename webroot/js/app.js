// MODAL NOTIFICATION
;(function($, undefined) {
  'use strict';

  var $launch = $('.launch'),
      $modal = $('.modal');

  $launch.on('click', function(e) {
    e && e.preventDefault();

    $('.modal-overlay').show();
    window.setTimeout(function() {
      $modal.addClass('open');
    }, 0);
  });

  $modal.on('click', '.close', function(e) {
    e && e.preventDefault();
    $('.modal-overlay').css('display', 'none');
    $modal.removeClass('open').one('transitionend', function() {
    });
  });
}(jQuery));

// ANIMATION SCROLL
$(function() {

    jQuery.scrollSpeed(130, 800, 'easeOutCubic');

});

// PROFIL - TAB
$("ul.tabs a").click(function (e) {
    e.preventDefault();

    $(this).closest("li").addClass("active").siblings().removeClass("active");
    var i = $(this).closest("li").index();
    $("#container section:eq(" + i + ")").show().siblings().hide();
});

// PROFIL - EDIT
$(".btn").click(function() {
    $("#avatar-input").focus().click();
});
