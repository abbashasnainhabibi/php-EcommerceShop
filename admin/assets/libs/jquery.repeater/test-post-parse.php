<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
	<title></title>
</head>
<body>

<pre>
<?= json_encode($_POST, JSON_PRETTY_PRINT); ?>
</pre>
	<form method="POST">
		<input type="text" name="group[1][foo]" value="A"/>
		<input type="text" name="group[2][foo]" value="B"/>
		<input type="submit" value="Submit"/>
	</form>
</body>
</html>