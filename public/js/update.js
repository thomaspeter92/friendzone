$('#showFormButton').click(function(){
  $('#update-user').toggleClass('d-none')
})

if (window.location.search.search("updated=true") > 0) {
  alert('Profile successfully updated')
}
if (window.location.search.search("updated=false") > 0) {
  alert('Profile update fail')
}

$('#updateForm').submit(function(e) {
  const emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
  const emailInput = $('#emailInput')
  const phoneNumberInput = $('#phoneNumberInput')
  const bioInput = $('#biographyInput')
  const firstNameInput = $('#firstNameInput')
  const lastNameInput = $('#lastNameInput')
  if(!emailRegex.test(emailInput.val())){
    emailInput.addClass('is-invalid');
    return false
  }
  if(!/^\d{9,11}$/.test(phoneNumberInput.val())){
    phoneNumberInput.addClass('is-invalid')
    return false
  }
  if(bioInput.val().trim().length < 1) {
    bioInput.addClass('is-invalid')
    return false
  }
  if(firstNameInput.val().trim().length < 1) {
    firstNameInput.addClass('is-invalid')
    return false
  }
  if(lastNameInput.val().trim().length < 1) {
    lastNameInput.addClass('is-invalid')
    return false
  }
  })