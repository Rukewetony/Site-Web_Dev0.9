$(window).scroll(function(){
  if ($(this).scrollTop()>0) {
    $('.header-menu').addClass('fixed');
    $('.logo').addClass('min');
  } else {
    $('.header-menu').removeClass('fixed');
    $('.logo').removeClass('min');
  }
});