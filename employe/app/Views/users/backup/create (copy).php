

<!-- Modal -->
<div class="modal fade" id="createuser" tabindex="-1" aria-labelledby="createuserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Create Account  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="row">			
				<form class="" action="/create_user" method="post" id="myForm" >
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
									<input type="text" class="form-control" name ="firstname" id="firstname" value="<?= set_value('firstname');?>" placeholder="First Name">
									<small> Enter your first name here </small>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" name ="lastname" id="lastname" value="<?= set_value('lastname');?>" placeholder="Last Name">
								<small> Enter your last name here </small>
							</div>
						</div>
						<div class="col-12 col-sm-9">
							<div class="form-group">

								<input type="text" class="form-control" name ="email" id="email" value="<?= set_value('email');?>" placeholder="Enter your Email">
								<small> You can use only one e-mail address to create user account </small>
							</div>
						</div>
						<div class="col-12 col-sm-3">
							<div class="form-group">

								<input type="tel" class="form-control" name ="mobile" id="mobile" value="<?= set_value('mobile');?>" placeholder="Mobile No "  pattern="[0-9]{3}[0-9]{7}" required>
								<small>Format: 0774567890</small>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">


								<input type="password" class="form-control" name ="password" id="passwd" value="" placeholder="Password ">

							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">

								<input type="password" class="form-control" name ="cpassword" id="cpasswd" value="" placeholder="Confirm ">

							</div>
						</div>
						<div class="col-12 col-sm-12">
								<small> Use 8 or more characters with a mix of letters, numbers & symbols </small>
						</div>
						<div class="col-12">
							 <div class="form-group">

									<input type="hidden" name="role" value="Student">

							  </div>
						</div>
						<?php if (isset($validation)): ?>
						<div class="col-12">
							<div class="alert alert-danger" role="alert">
								<?= $validation->listErrors(); ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					
					</div>
					<input type="submit" class="btn btn-primary align-right" value="Save" id="sbmitBtn">

				</form>
</div>

</div>
</div>




