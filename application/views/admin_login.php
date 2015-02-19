</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Admin Login</h3>
			</div>
			<div class="panel-body panel-body-center">
			<?php if (validation_errors() != NULL) { ?>
				<div class="alert alert-danger" role="alert">
<!-- 					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span> -->
					<?php echo validation_errors(); ?>
				</div>
			<?php } ?>
			<?php echo form_open('verify_admin_login'); ?>
				<div class="form-group">
					<label for="username">Username: </label>
					<input class="" type="text" name="username" id="username"><br>
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input class="" type="password" name="password" id="password"><br>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>