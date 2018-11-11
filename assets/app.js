var editor = ace.edit('wp-admin-css-editor');
editor.setTheme('ace/theme/monokai');
editor.session.setMode('ace/mode/css');

document.getElementById('wp-admin-css-toggle')
	.addEventListener('click', function(e) {
		e.preventDefault();
		var checkboxes = document.getElementsByClassName('wp-admin-css-check');
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = !checkboxes[i].checked;
		}	
	});