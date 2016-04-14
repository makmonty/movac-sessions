$(function() {
	$("#user_form").submit(function() {
		validateUser(this);
	});
});

function validateUser(form) {
	var ok = validateForm(form);
	// Validaciones adicionales
	
	return ok;
}