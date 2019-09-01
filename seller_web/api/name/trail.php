<!DOCTYPE html>
<html>
<head>
	<title>Trial Seller api</title>
</head>
<body>
	<form id="foo" method="POST">
		<input type="text" name="ip1">
		<input type="text" name="ip2">
	</form>
	<div id="div1"></div>
	<button class="btn">Click</button>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	$(".btn").click(function() 
	{

    /* Get from elements values */
    var values = $("#foo").serialize();
    //console.log(values);

    /* Send the data using post and put the results in a div. */
    /* I am not aborting the previous request, because it's an
       asynchronous request, meaning once it's sent it's out
       there. But in case you want to abort it you can do it
       by abort(). jQuery Ajax methods return an XMLHttpRequest
       object, so you can just use abort(). */
		$.ajax({
            url: "./index.php",
            type: "POST",
            data: values,
            success: function(d)
            {
            	console.log(d);
            }
        });

    /*  Request can be aborted by ajaxRequest.abort() */
	});
	/*$(".btn").click(function())*/
</script>
</body>
</html>