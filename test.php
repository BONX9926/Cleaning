<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://unpkg.com/vue"></script>
</head>
<body>
<child my-message="hello!"></child>
<script type="text/javascript">
	Vue.component('child', {
		// camelCase in JavaScript
		props: ['myMessage'],
		template: '<span>{{ myMessage }}</span>'
	})
</script>
</body>
</html>