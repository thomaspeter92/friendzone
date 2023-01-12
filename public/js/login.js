  // If redriected from fialed login (user not found), display error message.
  if (window.location.search.search("error=noUser") > 0) {
    $('#errorMessage').html('Unable to log in. Check your email & password. Or sign up if you\'re a new user!').removeClass('d-none');
  }
  // Login form validation. 
  $('#loginForm').submit((e) => {
    const emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
    const passowrdRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{5,15}$/
    const emailVal = $('#emailInput').val()
    const passwordVal = $('#passwordInput').val()
    if (!emailRegex.test(emailVal)) {
      $('#emailInput').addClass('is-invalid');
      return false;
    } else {
      $('#emailInput').removeClass('is-invalid');
    }
    if (!passowrdRegex.test(passwordVal)) {
      $('#passwordInput').addClass('is-invalid');
      return false;
    } else {
      $('#passwordInput').removeClass('is-invalid');
    }
  })