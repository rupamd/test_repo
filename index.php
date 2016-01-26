<!DOCTYPE html>
<html>
<head>
	<title>SampleDB</title>
</head>
<body>

<?php echo $_SERVER['PHP_SELF']; ?>

<form name="myform" action="displayAllRecords.php" method="post" onsubmit="return submitForm();">
	<div>
		<label>Id</label>
		<input type="text" id="id" />
	</div>
	<div>
		<label>Name</label>
		<input type="text" id="name" />
	</div>
	<div>
		<label>Count</label>
		<input type="text" id="count" />
	</div>
	<div>
		<input type="button" value="Cancel" />
		<input type="submit" value="Submit" />
	</div>
</form>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	var submitForm = function() {
		if(validateForm()){
			
			columns = {id: $('#id').val(), name: $('#name').val(), count: $('#count').val()};

			//console.log(columns);

			$.ajax({
			   	url: $('form').attr('action'),
			    type: $('form').attr('method'),
			    //data: JSON.stringify($('form').serialize()),
			    
			    data: columns,
			    success: function(response){
			    	console.log(response);
			    },
			    error: function(xhr, desc, err){
			    	console.log(desc);
			    }
			});
		}
		return false;
	}

	validateForm = function(){
		return true;
	}
</script>

</body>
</html>