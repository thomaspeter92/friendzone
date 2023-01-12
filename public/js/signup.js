// SIGN UP SCRIPT
$('#signupForm').submit(function(e) {

  e.preventDefault();
  const emailInput = $('#emailInput')
  const passwordInput = $('#passwordInput')
  const phoneNumberInput = $('#phoneNumberInput')
  const bioInput = $('#biographyInput')
  const firstNameInput = $('#firstNameInput')
  const lastNameInput = $('#lastNameInput')

  const emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
  const passowrdRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{5,15}$/
  // STEP 1 - VALIDATE INPUTS & SHOW ERROR MESSAGES
  if(firstNameInput.val().trim().length < 1) {
    firstNameInput.addClass('is-invalid')
    return
  }else{
    firstNameInput.removeClass('is-invalid')
  }
  if(lastNameInput.val().trim().length < 1) {
    lastNameInput.addClass('is-invalid')
    return
  } else {
    lastNameInput.removeClass('is-invalid')
  }
  if(!emailRegex.test(emailInput.val())){
    emailInput.addClass('is-invalid')
    return
  } else {
    emailInput.removeClass('is-invalid')
  }
  if (!passowrdRegex.test(passwordInput.val())) {
    $('#passwordInput').addClass('is-invalid');
    return false;
  } else {
    $('#passwordInput').removeClass('is-invalid');
  }
  if(!/^\d{9,11}$/.test(phoneNumberInput.val())){
    phoneNumberInput.addClass('is-invalid')
    return
  } else {
    phoneNumberInput.removeClass('is-invalid')
  }
  if(bioInput.val().trim().length < 1) {
    bioInput.addClass('is-invalid')
    return
  } else {
    bioInput.removeClass('is-invalid')
  }

  const formData = {
    email: emailInput.val(),
    phone_number: phoneNumberInput.val(),
    first_name: firstNameInput.val(),
    last_name: lastNameInput.val(),
    biography: bioInput.val(),
    password: passwordInput.val(),
  }
  $.ajax({
    type: "POST",
    url: "index.php?action=handle-signup",
    data: formData,
    dataType: "json",
    encode: true,
    success: (res) => {
      if (res.success) {
        $('#myModal').modal('show');
        return
      }
      $('#signupAlertError').html(res.message).removeClass('d-none');
      setTimeout(() => {
        $('#signupAlertError').addClass('d-none')
      }, 5000)
    },
    error: (err) => {
      console.log(err)
    }

  })
})