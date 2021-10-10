// $(document).ready(function () {
// 	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
// 	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
// 		return new bootstrap.Popover(popoverTriggerEl);
// 	});
// });

$(document).ready(function () {
	$('.nav-tabs a').click(function () {
		$(this).tab('show');
	});
	$('.nav-tabs a').on('shown.bs.tab', function (event) {
		var x = $(event.target).text(); // active tab
		var y = $(event.relatedTarget).text(); // previous tab
		$('.act span').text(x);
		$('.prev span').text(y);
	});
});

// $(document).ready(function () {
// 	$('[data-toggle="tooltip"]').tooltip();
// });

$(document).ready(function () {
	feather.replace({ 'aria-hidden': 'true' });
});
