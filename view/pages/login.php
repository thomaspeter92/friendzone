<?php
ob_start();
?>

<div class="container-sm d-flex justify-content-center align-items-center">
  <form id="loginForm" autocomplete="off" action="index.php?action=handle-login" method="POST">
    <h1 class="mb-3">Log In</h1>
    <label for="emailInput" class="form-label">Email Address</label>
    <input name="email" autocomplete="off" required placeholder="johndoe@example.com" type="email" class="form-control mb-2" id="emailInput" aria-describedby="emailHelp">
    <div class="invalid-feedback">Please enter a valid email address.</div>
    <label for="passwordInput" class="form-label">Password</label>
    <input name="password" autocomplete="off" required type="password" class="form-control mb-2" id="passwordInput">
    <div class="invalid-feedback">Password invalid</div>
    <button type="submit" class="btn btn-primary mt-3">Log In</button>
    <div class="alert alert-danger d-none mt-3" id="errorMessage"></div>
    <div class="alert alert-success mt-5" role="alert">
      <strong>Use the folling credentials:</strong> testuser@test.com Password!
    </div>
  </form>

</div>

<script src="public/js/login.js"></script>
<?php
$content = ob_get_clean();
require('./view/layout/layout.php');
