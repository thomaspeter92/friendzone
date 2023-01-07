<?php
ob_start();
?>

<div class="container-sm min-vh-100 d-flex justify-content-center align-items-center">
  <form id="signupForm" autocomplete="off" action="<?= PROJECT_ROOT_PATH ?>/handle-login" method="POST">
    <h1 class="mb-3">Log In</h1>
    <label for="emailInput" class="form-label">Email Address</label>
    <input name="email" autocomplete="off" required placeholder="johndoe@example.com" type="email" class="form-control mb-2" id="emailInput" aria-describedby="emailHelp">
    <label for="passwordInput" class="form-label">Password</label>
    <input name="password" autocomplete="off" required type="password" class="form-control mb-2" id="passwordInput">
    <button type="submit" class="btn btn-primary mt-3">Log In</button>
    <div class="alert alert-danger d-none mt-3" id="signupAlertError"></div>
    <div class="alert alert-success d-none mt-3" id="signupAlertSuccess">Sign up successful!</div>
  </form>
</div>
<?php

$content = ob_get_clean();
require('./view/layout/layout.php');
