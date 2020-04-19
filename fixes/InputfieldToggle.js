$(document).on('click', '.InputfieldHeader', function(e) {
  let $li = $(e.target).closest('li.Inputfield');
  
  /**
   * This is an ugly hack to prevent ajax fields from closing right after
   * they have been clicked to open. This is because the ajax field triggers
   * a click on the header themself. Once the field was opened we remove the
   * ajax class so that the regular behaviour is applied.
   */
  if($li.hasClass('collapsed10')) return $li.addClass('ajax');
  if($li.hasClass('ajax')) return $li.removeClass('ajax');

  $li.addClass('InputfieldStateWasCollapsed');
});
