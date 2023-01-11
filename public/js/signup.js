
// SIGN UP SCRIPT
$('#signupForm').submit(function(e) {
  e.preventDefault();
  const formData = {
    email: $('#emailInput').val(),
    phone_number: $('#phoneNumberInput').val(),
    first_name: $('#firstNameInput').val(),
    last_name: $('#lastNameInput').val(),
    biography: $('#biographyInput').val(),
    password: $('#passwordInput').val(),
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