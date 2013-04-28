window.addEvent('domready', function() {
	document.formvalidator.setHandler('title',
		function (value) {
			regex=/^[^0-9]|[\s{0,1}]+[\w{0,3}]+$/;
                       
			return regex.test(value);
	});
});
