$(document).on('click', '.InputfieldHeader', function() {
  $(this).closest('li.Inputfield').addClass('InputfieldStateWasCollapsed');
});