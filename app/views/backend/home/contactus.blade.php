<div class="col-md-6 center-block">
    <h2 class="text-center">Contact Us</h2>
	<form class="form-horizontal" action="{{ url('contactus') }}" method="POST">
		<div class="form-group">
			<label>Name <red>*</red></label>
			<input type="text" name="name" placeholder="Name" value="" class="form-control" max="50">
		</div>
		<div class="form-group">
			<label>Email <red>*</red></label>
            <input type="email" name="email" placeholder="Email" value="" class="form-control">
		</div>
		<div class="form-group">
			<label>Mobile <red>*</red></label>
            <input type="text" name="mobile" placeholder="Mobile" value="" class="form-control">
		</div>
		<div class="form-group">
			<label>Category<red>*</red></label>
            <select name="type" class="form-control">
                <option value="1">Customer Care</option>
                <option value="2">Other Inquiry</option>
            </select>
		</div>
		<div class="form-group">
			<label>Message <red>*</red></label>
			<textarea name="message" placeholder="Enter message..." class="form-control" rows="8"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Submit" class="btn btn-primary" />
		</div>
	</form>
</div>