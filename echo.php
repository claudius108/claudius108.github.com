<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Results from echo.xql</title>
	</head>
	<body>
		<h1>Form posted data</h1>
		<pre><?php echo htmlentities( file_get_contents( "php://input" ) ); ?></pre>
		<h1>Environment variables</h1>
		<pre>
<?php
foreach($_SERVER as $key_name => $key_value) {
print $key_name . " = " . $key_value . "<br/>";
}


/*$headers = apache_request_headers();

foreach ($headers as $header => $value) {
    echo "$header: $value <br />";
}*/ 

?>
		</pre>
	</body>
</html>