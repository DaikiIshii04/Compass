$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle(function () {
      $('.arrow-down, .arrow-up').toggle();
    });
    $('body').toggleClass('modal-open');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle(function () {
      $('.arrow-down, .arrow-up').toggle();
    });
    $('body').toggleClass('modal-open');
  });
});
