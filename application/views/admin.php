	<script>
		$( document ).ready(function() {
    		$('#create').click(function(){
				window.location.href = "admin/create";
			});

			$('#manage').click(function() {
				window.location.href = "admin/manage";
			});
		});
	</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Admin Page</h3>
			</div>
			<div class="panel-body panel-body-center">
				<button class="btn btn-primary" id="create">Create Forms</button>
				<button class="btn btn-primary" id="manage">Manage Forms</button>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>