<?php
ob_start();
?>

<div class="container-sm min-vh-100 d-flex justify-content-center align-items-center">
  <form id="loginForm" autocomplete="off" action="index.php?action=handle-login" method="POST">
    <h1 class="mb-3">Log In</h1>
    <label for="emailInput" class="form-label">Email Address</label>
    <input name="email" autocomplete="off" required placeholder="johndoe@example.com" type="email" class="form-control mb-2" id="emailInput" aria-describedby="emailHelp">
    <label for="passwordInput" class="form-label">Password</label>
    <input name="password" autocomplete="off" required type="password" class="form-control mb-2" id="passwordInput">
    <button type="submit" class="btn btn-primary mt-3">Log In</button>
    <div class="alert alert-danger d-none mt-3" id="errorMessage"></div>
  </form>
</div>
<script>
  if (window.location.search.search("error=noUser") > 0) {
    $('#errorMessage').html('Unable to log in. Check your email & password. Or sign up if you\'re a new user!').removeClass('d-none');
  }
  // $('#loginForm').submit((e) => {
  //   if ($('#emailInput').val() !== "hehe@gmail.com") {
  //     console.log($('#emailInput').val())
  //     return false;
  //   }
  // })
</script>

<?php
$content = ob_get_clean();
require('./view/layout/layout.php');
