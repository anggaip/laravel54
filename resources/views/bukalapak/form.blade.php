<form action="{{ url('api/bl_auth') }}" method="POST" class="form-horizontal" role="form">
	{{ csrf_field() }}
		<div class="form-group">
			<legend>Authentication</legend>
		</div>

		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username:</label>
			<div class="col-sm-10">
				<input type="text" name="username" id="inputUsername" class="form-control" value="" required="required">
			</div>
		</div>

		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Password:</label>
			<div class="col-sm-10">
				<input type="password" name="password" id="inputPassword" class="form-control" value="" required="required">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
</form>