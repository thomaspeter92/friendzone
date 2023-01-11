<?php
ob_start();
?>
<!-- <div class="min-vh-100 d-flex justify-content-center align-items-center"> -->
<div class="container-sm min-vh-100 d-flex justify-content-center align-items-center">
  <form id="signupForm" autocomplete="off" method="POST">
    <h1 class="mb-3">Signup</h1>
    <div class="mb-3 row">
      <div class="col">
        <label for="firstNameInput" class="form-label">First Name</label>
        <input name="first_name" autocomplete="off" required type="text" class="form-control" id="firstNameInput">
      </div>
      <div class="col">
        <label for="lastNameInput" class="form-label">Last Name</label>
        <input name="last_name" autocomplete="off" required type="text" class="form-control" id="lastNameInput">
      </div>
    </div>
    <div class="mb-3 row">
      <div class="col">
        <label for="emailInput" class="form-label">Email Address</label>
        <input name="email" autocomplete="off" required placeholder="johndoe@example.com" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="col">
        <label for="phoneNumberInput" class="form-label">Phone Number</label>
        <input name="phone_number" autocomplete="off" required type="text" class="form-control" id="phoneNumberInput">
      </div>
    </div>

    <div class="mb-3">
      <label for="passwordInput" class="form-label">Password</label>
      <input name="password" autocomplete="off" required type="password" class="form-control" id="passwordInput">
    </div>
    <div class="mb-3">
      <label for="biographyInput" class="form-label">Please add a short biography</label>
      <textarea name="biography" autocomplete="off" required name="biography" class="form-control" id="biographyInput">
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <div class="alert alert-danger d-none mt-3" id="signupAlertError"></div>
    <div class="alert alert-success d-none mt-3" id="signupAlertSuccess">Sign up successful!</div>
  </form>
</div>
<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You signed up to FriendZone! Please log in to start chatting with your friends.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="index.php?action=login" type="button" class="btn btn-primary">Log In</a>
      </div>
    </div>
  </div>
</div>
<script src="public/js/app.js"></script>
<?php
$content = ob_get_clean();
require('./view/layout/layout.php');
