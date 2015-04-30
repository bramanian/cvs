<div class="col-md-8">	
	<form class="form-horizontal" action="{{ url('contactus') }}" method="POST">
		<div class="form-group">
			<label class ="control-label col-sm-4">Name <red>*</red></label>
			<div class="col-sm-8">
				<input type="text" name="name" placeholder="Name" value="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class ="control-label col-sm-4">Email <red>*</red></label>
			<div class="col-sm-8">
				<input type="text" name="email" placeholder="Email" value="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class ="control-label col-sm-4">Mobile <red>*</red></label>
			<div class="col-sm-8">
				<input type="text" name="mobile" placeholder="Mobile" value="" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class ="control-label col-sm-4">Type<red>*</red></label>
			<div class="col-md-8">
				<select name="type" class="form-control">
					<option value="1">Type 1</option>
					<option value="2">Type 2</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class ="control-label col-sm-4">Message <red>*</red></label>
			<div class="col-sm-8">
				<textarea name="message" placeholder="Enter message..." class="form-control"></textarea>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Submit" class="btn btn-primary" />
		</div>
	</form>
</div>