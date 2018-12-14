/** Requires jQuery */
$(function () {
	/** enables the stylesheet.  If javascript is disabled, normal checkboxes are used */
	$(document.body).addClass("styled-checkboxes");
});
$(document).on('change', 'input[type=checkbox]', function (e) {
	/** Catches the "checked" attribute up with the state of the checkbox */
	$(this).attr('checked', $(this).prop('checked'));
});