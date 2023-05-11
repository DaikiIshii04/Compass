$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    // 変数に要素を入れる
    // attr：出力→ 対象要素.attr(属性名、値)
    var delete_date = $(this).attr('delete_date');
    // delete-part-id はCalenderView.php内76に記載
    var delete_part_id = $(this).attr('delete-part-id');
    var delete_part = $(this).attr('delete_part');
    // 値を渡す
    $('.cancel-date-hidden').val(delete_date);
    $('.cancel-part-hidden').val(delete_part_id);
    $('.cancel-modal-date').text(delete_date);
    $('.cancel-modal-part').text(delete_part);
    return false;
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
